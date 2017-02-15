<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Rendering receipts in PDF
 */
class PosPDFGeneratorReceipt extends PosPDFGenerator
{
    /**
     * @var float
     */
    protected $height;

    /**
     *
     * @var string
     */
    protected $font_name = 'dejavusans';

    /**
     * @see parent::writePage()
     * Overrides:<br/>
     * - Set height of receipt based on real content
     */
    public function writePage()
    {
        $this->setHeightOfPage();
        parent::writePage();
    }

    protected function setPdfMargins()
    {
        $this->SetFooterMargin(0);
        $this->SetHeaderMargin(0);
        $this->setMargins($this->template_object->margin, 2);
    }

    /**
     * 
     * @see parent::getPageSizeFromFormat()
     */
    public function getPageSizeFromFormat($format)
    {
        if ($this->template_object) {
            // If no template, probably, there is no content, therefore we can't get real height of receipt.
            // convert height from pixel to inches 1px = 0.010416667 inches => 0.010416667*72 = 0.75
            $page_format = array($this->template_object->getWidth() * 72 / 25.4, $this->getHeight());
        } else {
            $page_format = parent::getPageSizeFromFormat($format);
        }
        return $page_format;
    }

    /**
     * HTML content is presented in multiple lines by itself.<br/>
     * Printed paper is narrow, chances are, 1 html line could be broken into next lines as well.
     * 
     * @param string $html
     * @return int
     */
    protected function calculateLinesOfText($html)
    {
        $text_lines = PosTools::convertHtmlToLines($html);
        $total_line = 0;
        foreach ($text_lines as $text_line) {
            $line_width = $this->GetStringWidth($text_line, $this->font_name, '', $this->template_object->getFontSize());
            $total_line += ceil($line_width / ($this->template_object->getWidth() - 2 * $this->template_object->margin));
        }
        return $total_line;
    }

    /**
     * 
     * @param float $height
     */
    public function setHeight($height)
    {
        $this->height = (float) $height;
    }

    /**
     * 
     * @return float
     */
    public function getHeight()
    {
        return $this->height;
    }

    protected function setHeightOfPage()
    {
        if (empty($this->height)) {
            $this->setHeight($this->getHeightOfPage());
            $this->setPageFormat($this->page_size);
        }
    }

    /**
     * @return float
     */
    protected function getHeightOfPage()
    {
        $heights = array();
        // 1. Height of content
        $total_lines = $this->calculateLinesOfText($this->header . $this->content . $this->footer);
        $product_lines = $this->calculateLinesOfText($this->product_tab);
        // Products are displayed in a table with multiple columns.
        // Number of lines occupied by a product is maximum of lines occupied by each cell.
        // Number of lines occupied by a cell, in turn, depends on real width of that cell.
        // That's why, it requires a special function to calculate lines of products.
        $product_real_lines = $this->getRealProductLines();
        $total_real_lines = $total_lines - $product_lines + $product_real_lines + $this->getExtraLines();

        $height_of_content = $total_real_lines * $this->template_object->getFontSize() * $this->template_object->getLetterHeight();
        $height_of_logo = $this->template_object->getLogoHeight() * 0.265; // 1 px = 0.264583 mm = 0.265 mm
        $heights[] = $height_of_content + $height_of_logo;
        // 2. Height of margins
        $heights[] = (float) $this->getHeaderMargin();
        $heights[] = (float) $this->getFooterMargin();
        $heights[] = (float) $this->tMargin;

        return array_sum($heights);
    }

    /**
     * <table>, <tr>, <td>... were striped out while they still need their own space.<br/>
     * These extra lines are to cover that.
     * @return int
     */
    protected function getExtraLines()
    {
        $extra_lines = 0;
        $product_padding_rate = (float) $this->template_object->getProductPaddingRate();
        // @todo: Git ID 622
        $xy = array(
            1 => 13,
            2 => 3,
            3 => -8,
            4 => -15,
            5 => -20,
            6 => -30,
            7 => -40
        );
        $products_count = count($this->template_object->getProducts());
        if ($product_padding_rate) {
            $product_lines = $this->getRealProductLines();
            // Temporarily, it's only tested if number of lines / products is between 1 - 7
            $lines_per_product = min(max(ceil($product_lines / $products_count), 1), 7);
            // Each {$product_padding_rate} products (just guestimated), add 1 more line + $xy
            $extra_lines = ceil($products_count / $product_padding_rate);
            $extra_lines *= ($products_count >= 10 ? $xy[$lines_per_product] : 1); // Git ID 622
        }
        $extra_lines += ($products_count < 10 ? 20 : 25); // Add 5 or 25 lines, based on number of products
        return $extra_lines;
    }

    /**
     * 
     * @return int
     */
    protected function getRealProductLines()
    {
        $cache_id = __CLASS__ . __METHOD__;
        if (!Cache::isStored($cache_id)) {
            $table_helper = new PosTableHelper();
            $table_helper->setHtml($this->product_tab);
            $table_helper->setWidth($this->template_object->getWidth() - 2 * $this->template_object->margin);
            $column_widths_in_pixel = $table_helper->getColumnWidths();
            $rows = $table_helper->getRows();
            $lines_by_row = array();
            foreach ($rows as $row_index => $row) {
                foreach ($row as $column_index => $cell_content) {
                    $cell_width = $column_widths_in_pixel[$column_index];
                    $cell_html_lines = PosTools::convertHtmlToLines($cell_content);
                    $lines_by_row[$row_index][$column_index] = 0;
                    foreach ($cell_html_lines as $i => $html_line) {
                        $content_width = $this->GetStringWidth($html_line, $this->font_name, '', $this->template_object->getFontSize());
                        $lines_by_row[$row_index][$column_index] += ceil($content_width / $cell_width);
                        // If the content width is greater than 70% of the cell, chances are, it's broken into 2nd line. +1 here!
                        if ($content_width < $cell_width && ($content_width / $cell_width) > 0.7) {
                            $lines_by_row[$row_index][$column_index] ++;
                        }
                    }
                }

                $lines_by_row[$row_index] = max($lines_by_row[$row_index]); // only care about maximum of lines occupied by this row
            }
            Cache::store($cache_id, array_sum($lines_by_row));
        }
        return Cache::retrieve($cache_id);
    }
}

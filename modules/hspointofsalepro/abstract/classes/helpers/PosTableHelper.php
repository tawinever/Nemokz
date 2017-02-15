<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Helper for processing tables
 */
class PosTableHelper
{
    /**
     *
     * @var string
     */
    protected $html;

    /**
     * In pixel
     * @var float
     */
    protected $width;

    /**
     * 
     * @param string $html
     * @return PosTableHelper
     */
    public function setHtml($html)
    {
        $this->html = $html;
        return $this;
    }

    /**
     * 
     * @param float $width
     * @return PosTableHelper
     */
    public function setWidth($width)
    {
        $this->width = $width;
        return $this;
    }

    /**
     * List of rows and their cells
     * @return array
     * <pre>
     * array(
     *  0 => array(// the 1st row
     *      string,// the 1st cell
     *      string,// the 2nd cell
     *      string,// the 3rd cell
     *      ...
     *  ),
     *  1 => array(// the 2nd row
     *      string,// the 1st cell
     *      string,// the 2nd cell
     *      string,// the 3rd cell
     *      ...
     *  )
     * )
     */
    public function getRows()
    {
        $table_rows = array(); // including the first row
        if (empty($this->html)) {
            return $table_rows;
        }
        $doc = new DOMDocument();
        $doc->loadHTML($this->html);
        $xpath = new DOMXPath($doc);
        $dom_rows = $xpath->query('//tr');
        $row_index = 0;
        foreach ($dom_rows as $row) {
            $cells = $xpath->query('td', $row);
            foreach ($cells as $cell) {
                $innerHTML = '';
                foreach ($cell->childNodes as $node) {
                    $tmp_doc = new DOMDocument();
                    $tmp_doc->appendChild($tmp_doc->importNode($node, true));
                    $innerHTML .= $tmp_doc->saveHTML();
                }
                $table_rows[$row_index][] = $innerHTML;
            }
            $table_rows[$row_index] = array_diff(array_map('trim', $table_rows[$row_index]), array('')); // Remove empty lines
            $row_index++;
        }
        return $table_rows;
    }

    /**
     * Get number of columns and their width in pixel
     * @return array
     * <pre>
     * array(
     *  float,
     *  float,
     *  ...
     * )
     */
    public function getColumnWidths()
    {
        $column_widths_in_pixel = array();
        if (empty($this->html)) {
            return $column_widths_in_pixel;
        }
        if (empty($this->width)) {
            return $column_widths_in_pixel;
        }
        $doc = new DOMDocument();
        $doc->loadHTML($this->html);
        $xpath = new DOMXPath($doc);
        $dom_headers = $xpath->query('//tr[1]/td'); // the first row
        foreach ($dom_headers as $header_column) {
            $width = $xpath->query('@width', $header_column);
            foreach ($width as $w) {
                $temp_width = (float) $w->value * $this->width;
                $column_widths_in_pixel[] = stripos($w->value, '%') !== false ? $temp_width / 100 : $temp_width;
            }
        }
        return $column_widths_in_pixel;
    }
}

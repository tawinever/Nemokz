<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Mainly for generating invoice or receipt
 */
abstract class PosPDFGenerator extends PDFGenerator
{
    /**
     * An instance of PosHTMLTemplateXxx class
     * @var mixed
     */
    protected $template_object;

    /**
     * Block of products in html
     * @var string
     */
    protected $product_tab;

    /**
     *
     * @var string
     */
    protected $page_size;

    /**
     * 
     * @param string $page_size A4, A5, K57, K80, etc...
     * @param boolean $use_cache
     * @param $orientation (string) page orientation. Possible values are (case insensitive):<br/>
     * <ul>
     *  <li>P or Portrait (default)</li>
     *  <li>L or Landscape</li>
     *  <li>'' (empty string) for automatic orientation</li>
     * </ul>
     */
    public function __construct($page_size, $use_cache = false, $orientation = PosConstants::ORIENTATION_PORTRAIT)
    {
        parent::__construct($use_cache);
        $this->page_size = $page_size;
        $this->setPageFormat($page_size, $orientation);
    }

    /**
     * An instance of PosHTMLTemplateXxx class
     * @param PosHTMLTemplate $template_object
     */
    public function setTemplateObject(PosHTMLTemplate $template_object)
    {
        $this->template_object = $template_object;
    }

    /**
     * @see parent::render()
     * We don't override anything here! It's just copied from parent::render()<br/>
     * But this function is here to prevent other overrides from chaning behavior of this method.<br/>
     * Other modules / modification can override PDFGenerator class and change behavior of this method.<br/>
     * 
     * Possible conflicts:<br/>
     * - Module "ba_prestashop_invoice" (Prestashop Invoice Template Builder) by buy-addons
     */
    public function render($filename, $display = true)
    {
        if (empty($filename)) {
            throw new PrestaShopException('Missing filename.');
        }

        $this->lastPage();

        if ($display === true) {
            $output = 'D';
        } elseif ($display === false) {
            $output = 'S';
        } elseif ($display == 'D') {
            $output = 'D';
        } elseif ($display == 'S') {
            $output = 'S';
        } elseif ($display == 'F') {
            $output = 'F';
        } else {
            $output = 'I';
        }

        return $this->output($filename, $output);
    }

    /**
     *
     * @see parent::createFooter()
     * This function is here for 2 reasons:<br/>
     * - the same reason as self::render()<br/>
     * - Minify HTML to prevent `&nbsp;` is shown in some servers
     */
    public function createHeader($header)
    {
        $this->header = $this->minifyHTML($header);
    }

    /**
     *
     * @see parent::createContent()
     * Overrides:<br/>
     * - Minify HTML to prevent `&nbsp;` is shown in some servers
     */
    public function createContent($content)
    {
        $this->content = $this->minifyHTML($content);
    }

    /**
     *
     * @see parent::createFooter()
     * This function is here for 2 reasons:<br/>
     * - the same reason as self::render()<br/>
     * - Minify HTML to prevent `&nbsp;` is shown in some servers
     */
    public function createFooter($footer)
    {
        $this->footer = $this->minifyHTML($footer);
    }

    /**
     * Set content of block of products
     * @param string $product_tab
     */
    public function createProductTab($product_tab)
    {
        $this->product_tab = $this->minifyHTML($product_tab);
    }

    /**
     * 
     * @param string $html
     * @return string
     */
    protected function minifyHTML($html)
    {
        $minified_html = Media::minifyCSS(Media::minifyHTML($html));
        // remove space between HTML tags
        // http://stackoverflow.com/questions/5362167/remove-whitespace-from-html
        return preg_replace('~>\s+<~', '><', $minified_html);
    }

    /**
     * @see parent::writePage()
     * Overrides:<br/>
     * - Introduce $this->setPdfMargins() so that we can be easy to change margins of different papers
     */
    public function writePage()
    {
        $this->setPdfMargins();
        $this->AddPage();
        $this->writeHTML($this->content, true, false, true, false, '');
    }

    /**
     * Copied from parent::writePage()
     */
    protected function setPdfMargins()
    {
        $this->SetHeaderMargin(5);
        $this->SetFooterMargin(18);
        $this->setMargins(10, 40, 10);
    }
}

<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Rendering receipts in HTML (K57)
 */
class PosHTMLTemplateReceiptK57 extends PosHTMLTemplateReceipt
{
    const WIDTH = 57; // in points
    const FONT_SIZE = 7; // in points
    const LETTER_HEIGHT = 1.9; // heigh of a letter, just guestimated
    const PRODUCT_PADDING = 0; // a new line required for each these number of products

    /**
     * 
     * @return float
     */
    public function getWidth()
    {
        return self::WIDTH;
    }

    /**
     * 
     * @return float
     */
    public function getFontSize()
    {
        return self::FONT_SIZE;
    }

    /**
     * 
     * @return float
     */
    public function getLetterHeight()
    {
        return self::LETTER_HEIGHT;
    }

    /**
     * 
     * @return float
     */
    public function getProductPaddingRate()
    {
        return self::PRODUCT_PADDING;
    }
}

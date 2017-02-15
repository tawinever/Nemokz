<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * 
 */
class PosCartRule extends CartRule
{
    /**
     * 
     * @param Context $context
     * @param string $type
     * @param float $value
     * @param array $names
     * <pre>
     * array(
     *  int => string,// id_lang => name by lang
     *  int => string,
     *  ...
     * )
     * @param string $description
     * @return PosCartRule
     */
    public static function addOrderDiscount(Context $context, $type, $value, array $names, $description = null)
    {
        $cart_rule = new self();
        $cart_rule->name = $names;
        $cart_rule->reduction_amount = ($type === PosConstants::DISCOUNT_TYPE_AMOUNT) ? (float) $value : 0;
        $cart_rule->reduction_percent = ($type === PosConstants::DISCOUNT_TYPE_PERCENTAGE) ? (float) $value : 0;
        $cart_rule->description = $description;
        $cart_rule->date_from = date('Y-m-d H:i:s', time());
        $cart_rule->date_to = date('Y-m-d H:i:s', time() + PosConstants::DISCOUNT_DURATION_ORDER);
        $cart_rule->code = Tools::passwdGen(8, 'NO_NUMERIC');
        $cart_rule->quantity = 1;
        $cart_rule->quantity_per_user = 1;
        $cart_rule->active = 1;
        $cart_rule->id_customer = (int) $context->cart->id_customer;
        $cart_rule->minimum_amount_currency = (int) $context->cart->id_currency;
        $cart_rule->reduction_currency = (int) $context->cart->id_currency;
        $cart_rule->reduction_tax = 1;
        $cart_rule->add();
        return $cart_rule;
    }
}

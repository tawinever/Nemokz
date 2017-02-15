<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * PosPayment for Point of Sale
 */
class PosPayment extends ObjectModel
{
    /**
     * Name of PosPayment.
     *
     * @var string
     */
    public $payment_name;

    /**
     * Integer id_module which PosPayment belongs to.
     *
     * @var int
     */
    public $id_module;

    /**
     * Reference of module.
     *
     * @var int
     */
    public $reference = 0;

    /**
     * Label name show in view.
     *
     * @var string
     */
    public $label;

    /**
     * Rule of each PosPayment.
     *
     * @var string
     */
    public $rule;

    /**
     * Boolean Status.
     *
     * @var int
     */
    public $active = true;

    /**
     *
     * @var int
     */
    public $position;
    public static $default_payments = array(
        array(
            'name' => 'Cash',
            'label' => 'Cash',
            'reference' => 0,
            'position' => 0,
            'rule' => ''
        ),
        array(
            'name' => 'Cheque',
            'label' => 'Cheque number',
            'reference' => 1,
            'position' => 1,
            'rule' => 'Cheque'
        ),
        array(
            'name' => 'Credit Card',
            'label' => 'Credit Card',
            'reference' => 1,
            'position' => 2,
            'rule' => 'cc'
        ),
        array(
            'name' => 'Installment',
            'label' => 'Installment',
            'reference' => 0,
            'position' => 3,
            'rule' => ''
        )
    );

    /**
     * @see ObjectModel::$definition
     */
    public static $definition = array(
        'table' => 'pos_payment',
        'primary' => 'id_pos_payment',
        'multilang' => true,
        'fields' => array(
            'id_module' => array('type' => self::TYPE_INT),
            'reference' => array('type' => self::TYPE_STRING),
            'rule' => array('type' => self::TYPE_STRING, 'validate' => 'isGenericName'),
            'active' => array('type' => self::TYPE_BOOL, 'validate' => 'isBool', 'required' => true),
            'position' => array('type' => self::TYPE_INT, 'validate' => 'isInt'),
            'payment_name' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 32),
            'label' => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isGenericName', 'size' => 32),
        ),
    );

    /**
     * 
     * @param string $autodate
     * @param string $null_values
     * @return boolean
     */
    public function add($autodate = true, $null_values = false)
    {
        $result = parent::add($autodate, $null_values);
        return $result && $this->updateShop();
    }

    /**
     * 
     * @return boolean
     */
    protected function updateShop()
    {
        $flag = true;
        $shops = Shop::getShops();
        foreach ($shops as $shop) {
            $sql = 'INSERT INTO `' . _DB_PREFIX_ . 'pos_payment_shop` (`id_pos_payment`, `id_shop`)
                    VALUE("' . $this->id . '","' . (int) $shop['id_shop'] . '")';
            $flag = $flag && Db::getInstance()->execute($sql);
        }
        return $flag;
    }

    /**
     *
     * @return boolean
     */
    public function delete()
    {
        $id_shop_list = Shop::getContextListShopID();
        if (count($this->id_shop_list)) {
            $id_shop_list = $this->id_shop_list;
        }

        $result = Db::getInstance()->delete($this->def['table'] . '_shop', '`' . $this->def['primary'] . '`=' . (int) $this->id . ' AND id_shop IN (' . implode(', ', $id_shop_list) . ')');
        $result &= parent::delete();

        return $result;
    }

    /**
     * Check relationship of entries.
     *
     * @return boolean
     */
    public function hasMultishopEntries()
    {
        if (!Shop::isFeatureActive()) {
            return false;
        }

        return (bool) Db::getInstance()->getValue('SELECT COUNT(*) FROM `' . _DB_PREFIX_ . $this->def['table'] . '_shop` WHERE `' . $this->def['primary'] . '` = ' . (int) $this->id);
    }

    /**
     * Get all available pos_payments.
     *
     * @param int  $id_lang id of language
     * @param int  $id_shop id of curret shop
     * @param boolean $active  enable or disable payments only
     *
     * @return array
     * <pre>
     * array
     * (
     *   [0] => Array
     *      (
     *          [id_pos_payment] => 1
     *          [id_module] => 0
     *          [reference] => 0
     *          [rule] =>
     *          [active] => 1
     *          [payment_name] => Cash
     *          [label] => Cash
     *      )
     *    [1] => array()
     * )
     */
    public static function getPosPayments($id_lang = null, $id_shop = null, $active = true)
    {
        if (empty($id_lang)) {
            $context = Context::getContext();
            $id_lang = (int) $context->language->id;
        }

        $sql_join = array('`' . _DB_PREFIX_ . 'pos_payment_lang` pl ON p.`id_pos_payment` = pl.`id_pos_payment`');
        $sql_where = array(
            'pl.`id_lang` = ' . (int) $id_lang,
            'p.`active` = ' . (int) $active,
        );
        if (!empty($id_shop)) {
            $sql_join[] = '`' . _DB_PREFIX_ . 'pos_payment_shop` ps ON p.`id_pos_payment` = ps.`id_pos_payment`';
            $sql_where[] = 'ps.`id_shop` = ' . (int) $id_shop;
        }

        $sql = 'SELECT
                        p.*,
                        pl.`payment_name`,
                        pl.`label`
                FROM `' . _DB_PREFIX_ . 'pos_payment` p
                JOIN ' . implode(' JOIN ', $sql_join) . '
                WHERE
                ' . implode(' AND ', $sql_where) . '
                GROUP BY p.`id_pos_payment`
                ORDER BY p.`position` ASC';
        return Db::getInstance()->executeS($sql, true);
    }

    /**
     * Get first payment id of point of sale.
     *
     * @return int
     */
    public static function getFirstPaymentId()
    {
        $sql = 'SELECT `id_pos_payment`		
                FROM `' . _DB_PREFIX_ . 'pos_payment`	
                ORDER BY `id_pos_payment` ASC';

        return Db::getInstance()->getValue($sql);
    }

    /**
     * Get name of pos payments.
     *
     * @param int $id_lang
     * @param int $id_shop
     *
     * @return array
     * <pre/>
     * Array
     *  (
     *      [0] => string
     *      [1] => string
     *  )
     */
    public static function getPosPaymentNames($id_lang, $id_shop)
    {
        $names = array();
        $pos_payments = self::getPosPayments($id_lang, $id_shop);
        if (!empty($pos_payments)) {
            foreach ($pos_payments as $pos_payment) {
                $names[] = $pos_payment['payment_name'];
            }
        }
        return $names;
    }

    /**
     *
     * @param boolean $way Up (1)  or Down (0)
     * @param int  $position
     * return boolean
     */
    public function updatePosition($way, $position)
    {
        $success = array();
        $success[] = Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'pos_payment`
                    SET `position`= `position` ' . ($way ? '- 1' : '+ 1') . '
                    WHERE `position` ' . ($way ? '> ' . (int) $this->position . ' AND `position` <= ' . (int) $position : '< ' . (int) $this->position . ' AND `position` >= ' . (int) $position));
        $success[] = Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'pos_payment`
                    SET `position` = ' . (int) $position . '
                    WHERE `id_pos_payment`=' . (int) $this->id);
        return array_sum($success) >= count($success);
    }

    /**
     * @deprecated since version 2.4.1 pospayment change to pos_payment
     * @return boolean
     */
    public static function resetPositions()
    {
        $success = array();
        if (Db::getInstance()->execute('SET @i = -1', false)) {
            $success[] = Db::getInstance()->execute('UPDATE `' . _DB_PREFIX_ . 'pospayment` SET `position` = @i:=@i+1');
        }
        return array_sum($success) >= count($success);
    }
    
    /**
     * 
     * @return int
     */
    public static function getHighestPosition()
    {
        $query = new DbQuery();
        $query->select('MAX(`position`) AS `max`');
        $query->from('pos_payment');
        
        return (int) Db::getInstance()->getValue($query);
    }

    /**
     * @return boolean
     */
    public static function installDefaultPayments()
    {
        if (self::getFirstPaymentId()) {
            return true;
        }
        $success = array();
        $languages = Language::getLanguages(false);
        foreach (self::$default_payments as $payment) {
            $pos_payment = new self();
            foreach ($languages as $language) {
                $pos_payment->payment_name[$language['id_lang']] = $payment['name'];
                $pos_payment->label[$language['id_lang']] = $payment['label'];
            }
            foreach ($payment as $key => $value) {
                if (!in_array($key, array('label', 'name'))) {
                    $pos_payment->{$key} = $value;
                }
            }
            $success[] = $pos_payment->add();
        }
        return array_sum($success) >= count($success);
    }
    
     /**
     * 
     * @return boolean
     */
    public static function addInstallmentPayment()
    {
        // New payment method
        $success = array();
        $languages = Language::getLanguages(false);
        foreach (self::$default_payments as $payment) {
            if (!($payment['name'] === 'Installment')) {
                continue;
            }
            $pos_payment = new self();
            foreach ($languages as $language) {
                $pos_payment->payment_name[$language['id_lang']] = $payment['name'];
                $pos_payment->label[$language['id_lang']] = $payment['label'];
            }
            foreach ($payment as $key => $value) {
                if (!in_array($key, array('label', 'name', 'position'))) {
                    $pos_payment->{$key} = $value;
                }
            }
            $pos_payment->position = self::getHighestPosition() + 1;
            $success[] = $pos_payment->add();
        }
        return array_sum($success) >= count($success);
    }
}

<?php
/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Extended Tools for RockPOS
 */
class PosTools extends Tools
{

    /**
     * Split string into array by regular expression
     * @see http://php.net/manual/en/function.mb-split.php
     * @see http://php.net/manual/en/function.preg-split.php
     */
    public static function split($pattern, $string, $limit = -1)
    {
        $split_function = function_exists('mb_split') ? 'mb_split' : 'preg_split';
        return $split_function($pattern, $string, $limit);
    }

    /**
     * 
     * @param string $html
     * @return array
     * <pre>
     * array(
     *  'lorem ipsum',// plain text content of a line
     *  'lorem ipsum',
     *  ...
     * )
     */
    public static function convertHtmlToLines($html)
    {
        // Remove "<script></script>", "<style></style>" and convert "<br/> tags into "\n"
        // "\n" needs to go with double quotes
        $clean_html = preg_replace('/<br(\s+)?\/?>/i', "\n", self::removeStyleAndScript($html));
        $lines1 = self::split("\n", strip_tags($clean_html));
        $lines2 = array_diff(array_map('trim', $lines1), array('')); // Remove empty lines
        return array_values($lines2);
    }

    /**
     * 
     * @param string $html
     * @return string
     */
    public static function removeStyleAndScript($html)
    {
        return preg_replace('/(<(script|style)\b[^>]*>).*?(<\/\2>)/is', "$1$3", $html);
    }

    /**
     * Override to work with PS 1.6.0.14 and older
     *
     * @return array|mixed|null
     */
    public static function array_replace()
    {
        if (is_callable('parent::array_replace')) {
            return call_user_func_array(array('Tools', 'array_replace'), func_get_args());
        } elseif (!function_exists('array_replace')) {
            $args = func_get_args();
            $num_args = func_num_args();
            $res = array();
            for ($i = 0; $i < $num_args; $i++) {
                if (is_array($args[$i])) {
                    foreach ($args[$i] as $key => $val) {
                        $res[$key] = $val;
                    }
                } else {
                    trigger_error(__FUNCTION__ . '(): Argument #' . ($i + 1) . ' is not an array', E_USER_WARNING);
                    return null;
                }
            }
            return $res;
        } else {
            return call_user_func_array('array_replace', func_get_args());
        }
    }
}

{**
 * Pos order history for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 *}
 {extends file="helpers/list/list_content.tpl"}
 {block name="open_td"}
    <td
        {if isset($params.position)}
                id="td_{if !empty($position_group_identifier)}{$position_group_identifier|escape:'htmlall':'UTF-8'}{else}0{/if}_{$tr.$identifier|escape:'htmlall':'UTF-8'}{if $smarty.capture.tr_count > 1}_{($smarty.capture.tr_count - 1)|intval}{/if}"
        {/if}
        class="{strip}{if !$no_link}pointer{/if}
        {if isset($params.position) && $order_by == 'position'  && $order_way != 'DESC'} dragHandle{/if}
        {if isset($params.class)} {$params.class|escape:'htmlall':'UTF-8'}{/if}
        {if isset($params.align)} {$params.align|escape:'htmlall':'UTF-8'}{/if}{/strip}"
        {if (!isset($params.position) && !$no_link && !isset($params.remove_onclick))}
                onclick="window.open('{$link->getAdminLink('AdminOrders')|escape:'html':'UTF-8'}&amp;{$identifier|escape:'html':'UTF-8'}={$tr.$identifier|escape:'html':'UTF-8'}&amp;view{$table|escape:'html':'UTF-8'}{if $page > 1}&amp;page={$page|intval}{/if}','_blank')">
        {else}
        >
        {/if}
{/block}
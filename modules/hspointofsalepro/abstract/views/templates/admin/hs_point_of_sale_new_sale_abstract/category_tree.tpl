{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<div id="container_category_tree">
    {if $is_prestashop16}
        {$category_tree}
    {else}
        <div class="tree-panel-label-title">
            <input type="checkbox"  name="filter-by-category" id="filter-by-category">
            {$hs_pos_i18n.filter_by_category|escape:'htmlall':'UTF-8'}
        </div>
        <div id="block_category_tree" style="display:none">
            {$category_tree}
        </div>
    {/if}

</div>

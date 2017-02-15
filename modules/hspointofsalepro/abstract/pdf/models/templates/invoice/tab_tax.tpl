{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}
<!--  TAX DETAILS -->
{if $tax_exempt}
    {$hs_pos_i18n.exempt_of_vat_according_to_section_259b_of_the_general_tax_code|escape:'htmlall':'UTF-8'}
{elseif (isset($tax_breakdowns) && $tax_breakdowns)}
    <table id="tax-tab" width="100%">
        <thead>
            <tr>
                <th class="header small">{$hs_pos_i18n.tax_detail|escape:'htmlall':'UTF-8'}</th>
                <th class="header small">{$hs_pos_i18n.tax_rate|escape:'htmlall':'UTF-8'}</th>
                    {if $display_tax_bases_in_breakdowns}
                    <th class="header small">{$hs_pos_i18n.base_price|escape:'htmlall':'UTF-8'}</th>
                    {/if}
                <th class="header-right small">{$hs_pos_i18n.total_tax|escape:'htmlall':'UTF-8'}</th>
            </tr>
        </thead>
        <tbody>
            {assign var=has_line value=false}

            {foreach $tax_breakdowns as $label => $bd}
                {assign var=label_printed value=false}

                {foreach $bd as $line}
                    {if $line.rate == 0}
                        {continue}
                    {/if}
                    {assign var=has_line value=true}
                    <tr>
                        <td class="white">
                            {if !$label_printed}
                                {if $label == 'product_tax_breakdown'}
                                    {$hs_pos_i18n.product|escape:'htmlall':'UTF-8'}
                                {elseif $label == 'shipping_tax_breakdown'}
                                    {$hs_pos_i18n.shipping|escape:'htmlall':'UTF-8'}
                                {elseif $label == 'ecotax_tax_breakdown'}
                                    {$hs_pos_i18n.ecotax|escape:'htmlall':'UTF-8'}
                                {elseif $label == 'wrapping_tax_breakdown'}
                                    {$hs_pos_i18n.wrapping|escape:'htmlall':'UTF-8'}
                                {/if}
                                {assign var=label_printed value=true}
                            {/if}
                        </td>

                        <td class="center white">
                            {$line.rate|escape:'htmlall':'UTF-8'} %
                        </td>

                        {if $display_tax_bases_in_breakdowns}
                            <td class="right white">
                                {if isset($is_order_slip) && $is_order_slip}- {/if}
                                {displayPrice currency=$order->id_currency price=$line.total_tax_excl}
                            </td>
                        {/if}

                        <td class="right white">
                            {if isset($is_order_slip) && $is_order_slip}- {/if}
                            {displayPrice currency=$order->id_currency price=$line.total_amount}
                        </td>
                    </tr>
                {/foreach}
            {/foreach}

            {if !$has_line}
                <tr>
                    <td class="white center" colspan="{if $display_tax_bases_in_breakdowns}4{else}3{/if}">
                        {$hs_pos_i18n.no_tax|escape:'htmlall':'UTF-8'}
                    </td>
                </tr>
            {/if}

        </tbody>
    </table>

{/if}
<!--  / TAX DETAILS -->

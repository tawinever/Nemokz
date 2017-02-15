{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{extends file="helpers/list/list_header.tpl"}
{block name='override_header'}
    {if $submit_form_ajax}
        <script type="text/javascript">
            parent.getSummary();
            parent.$.fancybox.close();
        </script>
    {/if}
{/block}

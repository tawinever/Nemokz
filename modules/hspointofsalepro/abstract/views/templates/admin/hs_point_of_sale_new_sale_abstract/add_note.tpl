{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<div class="row bootstrap" style="display: none" id="pos_add_note">
    <div class="col-lg-12">
        <form method="post" action="#" class="defaultForm form-horizontal" id="formAddNote">
            <div id="fieldset_0" class="panel">
                <div class="panel-heading">
                    <i class="icon-file-text"></i>{$hs_pos_i18n.add_note|escape:'htmlall':'UTF-8'}
                </div>
                <div class="form-wrapper">
                    <div class="form-group">
                        <textarea class="note_content" placeholder='{$hs_pos_i18n.custom_note_optional|escape:'htmlall':'UTF-8'}'>{$note|escape:'htmlall':'UTF-8'}</textarea>
                    </div>
                    <div class="form-group checkbox">
                        <label><input type="checkbox" class="show_note_on_invoice" value="1" name="show_note_on_invoice" {if $show_note_on_invoice == 1}checked="checked"{/if}> {$hs_pos_i18n.show_on_invoice_receipt|escape:'htmlall':'UTF-8'}</label>
                    </div>
                </div>							
            </div>
            <div class="panel-footer clearfix">
                <button class="btn btn-default pull-right add_note_button" value="1" type="button">
                    <i class="process-icon-save"></i>{$hs_pos_i18n['save']|escape:'htmlall':'UTF-8'}
                </button>
            </div>
        </form>
    </div>								
</div>
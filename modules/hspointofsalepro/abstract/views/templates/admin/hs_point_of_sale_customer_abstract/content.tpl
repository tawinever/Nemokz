{**
* RockPOS - Point of Sale for PrestaShop
* 
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

<script type='text/javascript'>
    state_token = '{getAdminToken tab='AdminStates'}';
    module_dir = '{$smarty.const._MODULE_DIR_|escape:'htmlall':'UTF-8'}';
    vat_number = 0;
    id_country_default = {$id_country_default|escape:'htmlall':'UTF-8'}
    ajaxUrl = '{$ajax_url|escape:'quotes':'UTF-8'}';
    msgError = '{$hs_pos_i18n.error|escape:'htmlall':'UTF-8'}';
    msgErrors = '{$hs_pos_i18n.errors|escape:'htmlall':'UTF-8'}';
    showMore = '{$hs_pos_i18n.show_more|escape:'quotes':'UTF-8'}';
    showLess = '{$hs_pos_i18n.show_less|escape:'quotes':'UTF-8'}';
    countriesNeedZipCode = {};
    {if isset($countries)}
        {foreach from=$countries item='country'}
            {if isset($country.need_zip_code)}
    countriesNeedZipCode[{$country.id_country|intval}] = '{$country.zip_code_format|escape:'htmlall':'UTF-8'}';
            {/if}
        {/foreach}
    {/if}

    $(document).ready(function () {
        ajaxStates(id_country_default);
        $('#id_country').change(function () {
            ajaxStates();
        });

        new PosCusomer();
        PosCusomer.instance.setAjaxUrl(ajaxUrl);
        PosCusomer.instance.init();
        $('#formAddCustomer .field:visible:enabled:first').focus();

    });
</script>

<div class="alert alert-danger" id="file-errors" style="display:none"></div>
<div class="row">
    <div class="col-lg-12">
        <form method="post" action="#" class="defaultForm form-horizontal" id="formAddCustomer">
            <div id="fieldset_0" class="panel">
                <div class="panel-heading">
                    <i class="icon-user"></i>{$hs_pos_i18n.customer|escape:'htmlall':'UTF-8'}
                </div>
                <div class="form-wrapper">
                    {if $genders|@count > 0}
                        <div class="form-group">
                            <label class="control-label col-lg-3">
                                {$hs_pos_i18n.social_title|escape:'htmlall':'UTF-8'}
                            </label>
                            <div>
                                <select name="customer_id_gender" class="field">
                                    {foreach from=$genders item=gender}
                                        <option value="{$gender->id|intval}">{$gender->name|escape:'htmlall':'UTF-8'}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    {/if}

                    <div class="form-group">
                        <label class="control-label col-lg-3 required">
                            {$hs_pos_i18n.first_name|escape:'htmlall':'UTF-8'}
                        </label>
                        <div>
                            <input type="text" required="required" class="field is_required validate" data-validate="isName" value="" name="customer_firstname">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-3 required">	
                            {$hs_pos_i18n.last_name|escape:'htmlall':'UTF-8'}	
                        </label>
                        <div>
                            <input type="text" required="required" class="field is_required validate" data-validate="isName" value="" name="customer_lastname">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="control-label col-lg-3">
                            {$hs_pos_i18n.email|escape:'htmlall':'UTF-8'}
                        </label>

                        <div>
                            <input type="text" data-validate="isEmail" class="validate" name="customer_email" class="field">
                        </div>
                    </div>
                    {if Configuration::get('PS_B2B_ENABLE')}
                        <div class="form-group">
                            <label class="control-label col-lg-3">{$hs_pos_i18n.company|escape:'htmlall':'UTF-8'}</label>
                            <div>
                                <input type="text" data-validate="isGenericName" class="validate" name="customer_company" class="field">
                            </div>
                        </div>  
                        <div class="form-group">
                            <label class="control-label col-lg-3">{$hs_pos_i18n.siret|escape:'htmlall':'UTF-8'}</label>
                            <div>
                                <input type="text" name="customer_siret" class="field">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-lg-3">{$hs_pos_i18n.ape|escape:'htmlall':'UTF-8'}</label>
                            <div>
                                <input type="text" name="customer_ape" class="field">
                            </div>
                        </div> 
                        <div class="form-group">
                            <label class="control-label col-lg-3">{$hs_pos_i18n.website|escape:'htmlall':'UTF-8'}</label>
                            <div>
                                <input type="text" name="customer_website" class="field">
                            </div>
                        </div>                         
                    {/if}

                </div>						
            </div>	

            <div id="fieldset_1" class="panel">
                <div class="panel-heading">
                    <i class="icon-envelope-alt"></i>{$hs_pos_i18n.address|escape:'htmlall':'UTF-8'}
                </div>	
                » <a class='display_block_address' href="#">{$hs_pos_i18n.show_more|escape:'htmlall':'UTF-8'}</a>
                <div class="form-wrapper block_address" style='display:none;'>

                    <div class="form-group">
                        <label class="control-label col-lg-3">{$hs_pos_i18n.company|escape:'htmlall':'UTF-8'}</label>
                        <div class="">
                            <input type="text" value="" data-validate="isGenericName" class="validate" name="company">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">{$hs_pos_i18n.tax_number|escape:'htmlall':'UTF-8'}</label>
                        <div class="">
                            <input type="text" value="" data-validate="isGenericName" class="validate" name="vat_number">
                        </div>
                    </div>        

                    <div class="form-group">
                        <label class="control-label col-lg-3">{$hs_pos_i18n.address|escape:'htmlall':'UTF-8'}</label>
                        <div class="">
                            <input type="text" data-validate="isAddress"  class="validate" value="" name="address1">
                        </div>
                    </div>

                    <div class="form-group">

                        <label class="control-label col-lg-3">{$hs_pos_i18n.city|escape:'htmlall':'UTF-8'}</label>
                        <div class="">
                            <input type="text" data-validate="isCityName"  class="validate" value="" name="city">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">
                            {$hs_pos_i18n.zip_postal_code|escape:'htmlall':'UTF-8'}
                        </label>
                        <div class="">
                            <input type="text" data-validate="isPostCode"  class="validate" value="" name="postcode">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">{$hs_pos_i18n.mobile_phone|escape:'htmlall':'UTF-8'}</label>
                        <div class="">
                            <input type="text" data-validate="isPhoneNumber"  class="validate" value="" name="phone_mobile">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-lg-3">{$hs_pos_i18n.home_phone|escape:'htmlall':'UTF-8'}</label>
                        <div class="">
                            <input type="text" data-validate="isPhoneNumber"  class="validate" value="" name="phone">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-lg-3">{$hs_pos_i18n.country|escape:'htmlall':'UTF-8'}	</label>
                        <div class="">
                            <select id="id_country" class="fixed-width-xl" name="id_country">
                                {foreach from=$countries item='country'}
                                    <option value="{$country.id_country|escape:'htmlall':'UTF-8'}" {if $country.id_country == $id_country_default}selected='selected'{/if}>{$country.name|escape:'htmlall':'UTF-8'}</option>
                                {/foreach}	
                            </select>
                        </div>
                    </div>


                    <div id="contains_states" class="form-group">
                        <label class="control-label col-lg-3">{$hs_pos_i18n.state|escape:'htmlall':'UTF-8'}</label>
                        <div class="">
                            <select id="id_state" class=" fixed-width-xl" name="id_state">
                                <option value="0">-</option>
                            </select>
                        </div>
                    </div>
                </div>			
            </div>

            <div class="panel-footer clearfix">
                <button id="submitAddCustomer" type="button" value="1" class="btn btn-default pull-right">
                    <i class="process-icon-save"></i> {$hs_pos_i18n.save|escape:'htmlall':'UTF-8'}
                </button>
                <img class="ajax_running_image" src="../img/loader.gif">
            </div>	
        </form>
    </div>								
</div>



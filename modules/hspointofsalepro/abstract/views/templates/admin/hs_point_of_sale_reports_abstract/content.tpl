{**
* RockPOS - Point of Sale for PrestaShop
*
* @author    Hamsa Technologies
* @copyright Hamsa Technologies
* @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*}

{if isset($modules) && !empty($modules)}
    <div class="pos-reports" id="pos-reports"></div>    
    <script type="text/javascript">        
		moduleList = {$modules|@json_encode|escape:'quotes':'UTF-8'};
		durations = {$durations|@json_encode|escape:'quotes':'UTF-8'};
		{literal}
		itemText = 
		{
			apply: stPos.lang.apply,
			cancel: stPos.lang.cancel,
			thereWasAConnectingProblem: stPos.lang.there_was_a_connecting_problem,
			requestedPageNotFound: stPos.lang.requested_page_not_found,
			internalServerError: stPos.lang.internal_server_error,
			requestTimeOut: stPos.lang.request_time_out,
			oopsSomethingGoesWrong: stPos.lang.oops_something_goes_wrong
		};
       
        DateUtilities = {
            pad(value, length) {
                while (value.length < length)
                    value = "0" + value;
                return value;
            },
            clone(date) {       
                return new Date(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds(), date.getMilliseconds());
            },
            toString(date) {
                return date.getFullYear() + "-" + DateUtilities.pad((date.getMonth()+1).toString(), 2) + "-" + DateUtilities.pad(date.getDate().toString(), 2);
            },
            toDayOfMonthString(date) {
                return DateUtilities.pad(date.getDate().toString());
            },
            toMonthAndYearString(date, months) {
                return months[date.getMonth()] + " " + date.getFullYear();
            },
            moveToDayOfWeek(date, dayOfWeek) {
                while (date.getDay() !== dayOfWeek)
                    date.setDate(date.getDate()-1);
                return date;
            },
            isSameDay(first, second) {
                return first.getFullYear() === second.getFullYear() && first.getMonth() === second.getMonth() && first.getDate() === second.getDate();
            },
            isBefore(first, second) {
                return new Date(first).getTime() < new Date(second).getTime();
            },
            isAfter(first, second) {
                return new Date(first).getTime() > new Date(second).getTime();
            }
        };
		
		{/literal}
</script>
<script>
    {literal}
        function handleError() {
            alert('The app stops due to some files are missed.');        
        }
        $(document).ready(function (){
            
            window.addEventListener("error", handleError, true);   
        })
        
    {/literal}
</script>
<script src="{$js_path|escape:'quotes':'UTF-8'}reports.js"></script>

{else}
    <p>
        <i class="icon-external-link-sign"></i>
        <a href="{$addons_url|escape:'htmlall':'UTF-8'}" target="_blank">{$hs_pos_i18n.click_here_to_pick_up_your_own_reports|escape:'htmlall':'UTF-8'}</a>
    </p>
{/if}
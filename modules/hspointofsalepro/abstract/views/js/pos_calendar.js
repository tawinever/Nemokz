/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

/**
 * Pos Calendar
 * @returns {PosCalendar}
 */
var PosCalendar = function ()
{
    /**
     * Define all selectors default
     */
    this._selectors = {
        dateEnd: '#date-end',
        dateStart: '#date-start',
        datePicker: '#datepicker',
        datepickerExpand: '#datepickerExpand',
        selectDate: '.select_date',
        datepickerCancel: '#datepicker-cancel',
        blockCalender: '#ui-datepicker-div'
    };
    
    PosCalendar.instance = this;

    this.handleEvents = function (){
        var onStartDate = function (date) {
            var minEndDate = (date !== '') ? date : null;
            $(PosCalendar.instance._selectors.dateEnd).datepicker('option', 'minDate', minEndDate);
            $(PosCalendar.instance._selectors.dateEnd).val(minEndDate);
            if(minEndDate !== null){
                $(PosCalendar.instance._selectors.dateEnd).focus();
            }
        };
        var onEndDate = function (date) {
            var maxStartDate = (date !== '') ? date : null;
            $(PosCalendar.instance._selectors.dateStart).datepicker('option', 'maxDate', maxStartDate);
        };

        $(PosCalendar.instance._selectors.dateStart).datepicker({
            maxDate: 0,
            dateFormat: 'yy-mm-dd',
            onClose: onStartDate
        });
        
        $(PosCalendar.instance._selectors.dateEnd).datepicker({
            maxDate: 0,
            dateFormat: 'yy-mm-dd',
            onClose: onEndDate
        });
        
        PosCalendar.instance.setDisableDurationDate(window.selectedDuration);
        
        $(document).on('change', PosCalendar.instance._selectors.selectDate, function () {
            var selectedDate = $(this).val();
            PosCalendar.instance.setDisableDurationDate(selectedDate);
        });

        $(PosCalendar.instance._selectors.datepickerExpand).on('click', function () {
            PosCalendar.instance.setDisableDurationDate(window.selectedDuration);
            if ($(PosCalendar.instance._selectors.datePicker).hasClass('hide'))
            {
                $(PosCalendar.instance._selectors.datePicker).removeClass('hide');
            } else {
                $(PosCalendar.instance._selectors.blockCalender).css('display','none');
                $(PosCalendar.instance._selectors.datePicker).addClass('hide');
            }
        });
        
        $(PosCalendar.instance._selectors.datepickerCancel).on('click', function () {
            $(PosCalendar.instance._selectors.blockCalender).css('display','none');
            $(PosCalendar.instance._selectors.datePicker).addClass('hide');
        });
    };

    this.setDisableDurationDate = function (selectedDuration) {
        if (selectedDuration === window.customDate) {
            $(PosCalendar.instance._selectors.dateStart).removeAttr('disabled');
            $(PosCalendar.instance._selectors.dateEnd).removeAttr('disabled');
            $(PosCalendar.instance._selectors.dateStart).focus();
        } else {
            $(PosCalendar.instance._selectors.dateStart).attr('disabled', 'disabled');
            $(PosCalendar.instance._selectors.dateEnd).attr('disabled', 'disabled');
        }
        $(PosCalendar.instance._selectors.selectDate).val(selectedDuration);
        $(PosCalendar.instance._selectors.dateStart).val(window.dateFilter[selectedDuration]['from']);
        $(PosCalendar.instance._selectors.dateEnd).val(window.dateFilter[selectedDuration]['to']);
    };
};


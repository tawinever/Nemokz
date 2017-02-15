/**
 * RockPOS - Point of Sale for PrestaShop
 *
 * @author    Hamsa Technologies
 * @copyright Hamsa Technologies
 * @license   http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
 */

$(document).ready(function ()
{
    $('#filter-by-category').attr('checked', false);
    $('#filter-by-category').click(function () {
        if ($(this).is(':checked')) {
            $('#block_category_tree').show();
            $('#category-tree-toolbar').show();
        } else {
            $('#block_category_tree').hide();
            $('#category-tree-toolbar').hide();
        }
    });

    $('#check_all').click(function () {
        checkAllCategories();
    });

    $('#uncheck_all').click(function () {
        uncheckAllCategories();
    });

    function checkAllCategories()
    {
        if (needExpandAllCategories())
            expandAllCategories();
        else
            $("#categories-treeview").find(':input[type=checkbox]').each(function () {
                $(this).attr('checked', true);
            });
    }

    function uncheckAllCategories()
    {
        if (needExpandAllCategories())
            expandAllCategories();
        else
            $("#categories-treeview").find(':input[type=checkbox]').each(function () {
                $(this).removeAttr('checked');
            });
    }
});

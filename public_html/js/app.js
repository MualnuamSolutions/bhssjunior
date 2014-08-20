// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();
$(function () {
    $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"}).chosenSortable();

    $('.fdatepicker').fdatepicker({
        format: 'yyyy-mm-dd'
    });

    $("form.toolbar select").on('change', function(){
        $(this).closest('form').submit();
    });
});

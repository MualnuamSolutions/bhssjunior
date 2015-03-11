// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation();
$(function () {
    $(".chosen-select").chosen({no_results_text: "Oops, nothing found!"});

    $('.fdatepicker').fdatepicker({
        format: 'yyyy-mm-dd'
    });

    $("form.toolbar select").not('.select-all').on('change', function(){
        $(this).closest('form').submit();
    });

    $('.select-all option').prop('selected', true);
    $('#select_all').click(function() {
	    if(!$('.select-all option').prop('selected'))
	    	$('.select-all option').prop('selected', true);
	    else if($('.select-all option').prop('selected'))
	    	$('.select-all option').prop('selected', false);
	});
});

$(function() {
  $( ".calendar" ).datepicker({
		dateFormat: 'yy-mm-dd',
		firstDay: 1,
		onSelect: function(d, dtp) {

			$('#tanggal').val(d);
			$('#tanggal_label').text(d);
		}
	});
	
	$(document).on('click', '.date-picker .input', function(e){
		var $me = $(this),
				$parent = $me.parents('.date-picker');
		$parent.toggleClass('open');
	});
	
	
	$(".calendar").on("change",function(){
		var $me = $(this),
				$selected = $me.val(),
				$parent = $me.parents('.date-picker');
		$parent.find('.result').children('span').html($selected);
	});
});
function add_field_producer() {
	$('#add_input_producer').click(function() {
		$('#producer').toggleClass('show');
	});
}

function add_field_sort() {
	$('#add_input_sort').click(function() {
		$('#sort').toggleClass('show');
	});
}

$( document ).ready(function() {
   add_field_producer();
   add_field_sort();
});
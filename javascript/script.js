$(document).ready(function() {

	$('#keyword').on('keyup', function() {
		$('#container1').load('ajax/inventory_search.php?keyword=' + $('#keyword').val());
	});

});



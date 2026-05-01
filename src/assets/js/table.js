// Table Data - Detail Button
$('table').on('click', '.btn-info', function() {
	var url = $(this).parent().attr('href');
	$.get(url, function(data) {
		$('#modal-info .modal-header').html("<h4 class=\"modal-title\">Detail</h4>");
		$('#modal-info-body').html(data);
		$('#modal-info').modal('show');
	});
	return false;
});

// Table Data - Modify Button
$('table').on('click', '.btn-warning', function() {
	var url = $(this).parent().attr('href');
	$.get(url, function(data) {
		$('#modal-modify .modal-header').html("<h4 class=\"modal-title\">Modify</h4>");
		$('#modal-modify-body').html(data);
		$('#save').attr('href',url);
		$('#modal-modify').modal('show');
	});
	return false;
});

// Table Data - Remove Button
$('table').on('click', '.btn-danger', function() {
	var url = $(this).parent().attr('href');
	$('#modal-confirm-btn').attr('href',url);
	$('#modal-confirm').modal('show');
	return false;
});

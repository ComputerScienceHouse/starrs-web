$('#action-power').click(function() {
     $('#action-power .btn-warning').addClass("disabled");
     $.get($(this).attr('href'),function(data) {
          $('#modal-select-body').html(data);
          $('#modal-select').modal('show');
     });
     return false;
});

$('#execute').click(function() {
     var saveBtn = this;
     $(this).addClass("disabled");
	$('#modal-loading').show();
	$.post($('#action-power').attr('href')+"/"+$('[name=action]').val(),function(data) {
		handlePostRefresh(data, saveBtn);
	});
	return false;
});

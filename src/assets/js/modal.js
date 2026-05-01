// Modal-Modify Save Button
$('#save').click(function() {
	var saveBtn = this;
	$(this).addClass("disabled");
	var dataStr = $('#modify-form').serialize();
	$.post($(this).attr('href'),dataStr,function(data) {
		handlePostRefresh(data, saveBtn);
	});
	return false;
});

// Modal-Confirm Remove-Confirm Button
$('#modal-confirm-btn').click(function() {
	var saveBtn = this;
	$(this).addClass("disabled");
	$.post($(this).attr('href'),{confirm:"confirm"},function(data) {
		handlePostRedirect(data, saveBtn);
	});
	return false;
});

function setViewUserCookie(value) {
	Cookies.set('starrs_viewUser', value);
}

function getViewUserFromCookie() {
	return Cookies.get('starrs_viewUser');
}

function refresh() {
	window.location.reload(true);
}

function rawurlencode(str) {
	str = (str + '').toString();
	return encodeURIComponent(str).replace(/!/g, '%21').replace(/'/g, '%27').replace(/\(/g, '%28').replace(/\)/g, '%29').replace(/\*/g, '%2A');
}

function handlePostRefresh(data, saveBtn) {
	if (!data.match(/^\<script\>/g)) {
		$('#modal-error-body').html(data);
		$('#modal-error').modal('show');

		if (typeof saveBtn !== "undefined") {
			$(saveBtn).removeClass("disabled");
		}
	} else {
		refresh();
	}
}

function handlePostRedirect(data, saveBtn) {
	if (!data.match(/^\<script\>/g)) {
		$('#modal-error-body').html(data);
		$('#modal-error').modal('show');

		if (typeof saveBtn !== "undefined") {
			$(saveBtn).removeClass("disabled");
		}
	} else {
		$('head').html($('head').html() + data);
	}
}

function getSchemaFromUrl() {
	return window.location.pathname.split('/')[1];
}

$(document).ready(function() {
	// Forms
	$('#create-form').submit(function() {
		$.post(undefined, $('#create-form').serialize(), function(data) {
			handlePostRedirect(data);
		});
		return false;
	});

	$('#modify-form').submit(function() {
		$.post(undefined, $('#modify-form').serialize(), function(data) {
			handlePostRedirect(data);
		});
		return false;
	});

	$('#create-form .controls input, #modify-form .controls input').blur(function() {
		if ($(this).parent().parent().attr('class').match(/warning/g)) {
			return;
		};
		if ($(this).attr('value') != "") {
			$(this).parent().parent().removeClass("error");
		} else {
			$(this).parent().parent().addClass("error");
		}
	});

	$('#create-form .controls select, #modify-form .controls select').change(function() {
		if ($(this, 'option:selected').attr('value') != "") {
			$(this).parent().parent().removeClass("error");
		} else {
			$(this).parent().parent().addClass("error");
		}
	});

	$('[name=submit]').click(function() {
		$('#modal-loading').show();
		$(this).addClass('disabled');
	});

	$('.modal-footer .btn').click(function() {
		$('[name=submit]').removeClass('disabled');
		$('#modal-loading').hide();
	});

	// DataTables
	$(".datatable").each(function() {
		// Protect against re-initialization
		if (!$.fn.dataTable.isDataTable(this)) {
			$(this).DataTable({
				info: false,
				pagingType: "numbers",
				responsive: true
			});
		}
	});

	// Impersonation
	$("#stopImpersonating").click(function() {
		setViewUserCookie("");
		$("#modal-impersonate").modal('hide');
		window.location.reload(true);
	});

	$("#modal-impersonate-select").selectize({
		sortField: 'text'
	});

	$("#modal-impersonate-submit").click(function() {
		setViewUserCookie($("#modal-impersonate-select").val());
		$("#modal-impersonate").modal('hide');
		window.location.reload(true);
	});

	// UI Mode
	if (Cookies.get('starrs_uimode') === 'Advanced') {
		// Viewing as Advanced, want a button to Simple
		var icon = document.createElement('span');
		$(icon).addClass("glyphicon glyphicon-apple");
		$('#uitoggle').html(" Simple Mode");
		$('#uitoggle').prepend(icon);
		$('#uitoggle').data('mode', 'Simple');
		$('#uitoggle').attr("title", "Currently viewing in Advanced. Click to switch to Simple.");
	} else if (Cookies.get('starrs_uimode') === 'Simple') {
		// Viewing as Simple, want a button to Advanced
		var icon = document.createElement('span');
		$(icon).addClass("glyphicon glyphicon-flash");
		$('#uitoggle').html(" Advanced Mode");
		$('#uitoggle').prepend(icon);
		$('#uitoggle').data('mode', 'Advanced');
		$('#uitoggle').attr("title", "Currently viewing in Simple. Click to switch to Advanced.");
	} else {
		// No cookie set
		Cookies.set('starrs_uimode', 'Simple');
	}

	$('#uitoggle').click(function() {
		var viewMode = $(this).data('mode');

		if (viewMode == "Simple") {
			// Go to simple mode
			Cookies.set('starrs_uimode', 'Simple');
			refresh();
		} else {
			// Go to advanced mode
			Cookies.set('starrs_uimode', 'Advanced');
			refresh();
		}
	});

	// Remove Action Button
	$('#action-remove').click(function() {
		$(this).addClass("disabled");
		$('#modal-confirm-btn').attr('href', $('#action-remove').attr('href'));
		$('#modal-confirm').modal('show');
		return false;
	});

	// Google Chart
	// Doesn't automatically resize when window changes, so make it do that
	$(window).resize(function() {
		if ($('#chart_div').html() != null) {
			drawChart();
		}
	});

	// Hostname validation
	$('[name=hostname],[name=zone],[name=alias]').change(function() {
		var hostname = $('[name=hostname]').attr('value');
		var zone = $('[name=zone]').attr('value');
		$.get("/dns/records/check_hostname/" + zone + "/" + hostname, function(data) {
			if (data != "") {
				$('#inuse').removeClass('imp-hide');
			} else {
				$('#inuse').addClass('imp-hide');
			}
		});
	});

	// Tooltips
	$('#addr_state').tooltip({
		placement: "right"
	});

	$('dt').each(function() {
		var obj = $(this);

		$.get("/tooltip/view/" + getSchemaFromUrl() + "/" + $(this).html())
			.done(function(data) {
				obj.attr('title', data);
				obj.tooltip({
					placement: 'right'
				});
			});
	});

	$('th').each(function() {
		var obj = $(this);
		$.get("/tooltip/view/" + getSchemaFromUrl() + "/" + $(this).html())
			.done(function(data) {
				obj.attr('title', data);
				obj.tooltip({
					placement: 'bottom',
					container: 'body'
				});
			});
	});

	$('label').each(function() {
		var obj = $(this);
		var parent = obj.parent();
		var name = obj.html();

		// Exclude elements that never have tooltips
		if (parent.hasClass('checkbox') ||
			parent.hasClass('dataTables_length') ||
			parent.hasClass('dataTables_filter')) {
			return;
		}

		name = name.replace(/:/, "");
		$.get("/tooltip/view/" + getSchemaFromUrl() + "/" + name)
			.done(function(data) {
				obj.attr('title', data);
				obj.tooltip();
			});
	});
});

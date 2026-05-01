<form method="POST" id="create-form">
	<div class="form-group">
		<label class="control-label">Read-Only Community</label>
		<input type="text" class="form-control" name="ro" value="<?=$snmp->get_ro_community();?>" />
	</div>
	<div class="form-group">
		<label class="control-label">Read-Write Community</label>
		<input type="text" class="form-control" name="rw" value="<?=$snmp->get_rw_community();?>" />
	</div>
</form>

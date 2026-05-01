<form method="POST" id="create-form">
	<input type="hidden" name="group" value="<?=$g->get_group();?>" />
	<div class="form-group has-feedback">
		<label class="control-label">User</label>
		<input type="text" class="form-control" name="user" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Group Privilege</label>
		<select name="privilege" class="form-control">
			<option>USER</option>
			<option>ADMIN</option>
			<option>PROGRAM</option>
		</select>
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
</form>

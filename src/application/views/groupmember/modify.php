<form method="POST" id="create-form">
	<input type="hidden" name="group" value="<?=$gm->get_group();?>" />
	<div class="form-group has-feedback">
		<label class="control-label">User</label>
		<input type="text" class="form-control" name="user" value="<?=$gm->get_user();?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Group Privilege</label>
		<select name="privilege" class="form-control">
			<option <?=($gm->get_privilege() == 'USER')?"selected":"";?>>USER</option>
			<option <?=($gm->get_privilege() == 'ADMIN')?"selected":"";?>>ADMIN</option>
			<option <?=($gm->get_privilege() == 'PROGRAM')?"selected":"";?>>PROGRAM</option>
		</select>
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
</form>

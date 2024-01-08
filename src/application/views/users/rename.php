<form method="POST" id="modify-form">
	<div class="form-group">
		<label class="control-label">Old Username</label>
		<input type="text" class="form-control" name="oldusername" readonly value="<?=$user;?>" />
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">New Username</label>
		<input type="text" class="form-control" name="newusername" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
</form>

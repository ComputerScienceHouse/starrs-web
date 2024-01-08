<form method="POST" id="create-form">
	<div class="form-group">
		<label class="control-label">Hostname</label>
		<input type="text" class="form-control" name="hostname" />&nbsp;<span id="inuse" class="label label-danger starrs-hide">In use!</span>
	</div>
	<div class="form-group">
		<label class="control-label">Zone</label>
		<select name="zone" class="form-control">
			<option><?=$zone;?></option>
		</select>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Text</label>
		<input type="text" class="form-control" name="text" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">TTL</label>
		<input type="text" class="form-control" name="ttl" />
	</div>
</form>

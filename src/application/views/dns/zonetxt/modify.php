<form method="POST" id="modify-form">
	<div class="form-group">
		<label class="control-label">Hostname</label>
		<input type="text" class="form-control" name="hostname" value="<?=$zt->get_hostname();?>" />&nbsp;<span id="inuse" class="label label-danger starrs-hide">In use!</span>
	</div>
	<div class="form-group">
		<label class="control-label">Zone</label>
		<select name="zone" class="form-control">
			<option><?=$zt->get_zone();?></option>
		</select>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Text</label>
		<input type="text" class="form-control" name="text" value="<?=$zt->get_text();?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">TTL</label>
		<input type="text" class="form-control" name="ttl" value="<?=$zt->get_ttl();?>" />
	</div>
</form>

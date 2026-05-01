<form method="POST" id="create-form">
	<input type="hidden" name="address" value="<?=$address;?>" />
	<div class="form-group has-feedback">
		<label class="control-label">Alias</label>
		<input type="text" name="alias" class="form-control" />&nbsp;<span id="inuse" class="label label-danger starrs-hide">In use!</span>
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">Zone</label>
		<select name="zone" class="form-control">
			<?php
			foreach($zones as $zone) {
				print "<option value=\"".htmlentities($zone->get_zone())."\">".htmlentities($zone->get_zone())."</option>";
			}
			?>
		</select>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Priority</label>
		<input type="text" name="priority" class="form-control" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Weight</label>
		<input type="text" name="weight" class="form-control" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Port</label>
		<input type="text" name="port" class="form-control" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">TTL</label>
		<input type="text" name="ttl" class="form-control" />
	</div>
	<div class="form-group">
		<label class="control-label">Owner</label>
		<input type="text" name="owner" value="<?=htmlentities($user->get_user_name());?>" <?=($user->isAdmin())?"":"readonly"?> />
	</div>
</form>

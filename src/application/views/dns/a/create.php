<form method="POST" id="create-form">
	<div class="form-group has-feedback">
		<label class="control-label">Hostname</label>
		<input type="text" class="form-control" name="hostname" />&nbsp;<span id="inuse" class="label label-danger starrs-hide">In use!</span>
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
	<div class="form-group">
		<label class="control-label">TTL</label>
		<input type="text" class="form-control" name="ttl" />
	</div>
	<div class="form-group">
		<label class="control-label">Create Reverse?</label>
		<select name="reverse" class="form-control" <?($user->isAdmin())?"":"readonly"?>>
			<option value='t'>Yes</option>
			<option value='n'>No</option>
		</select>
	</div>
	<div class="form-group">
		<label class="control-label">Owner</label>
		<input type="text" class="form-control" name="owner" value="<?=htmlentities($user->get_user_name());?>" <?=($user->isAdmin())?"":"readonly"?> />
	</div>
</form>

<form method="POST" id="create-form">
	<input type="hidden" name="address" value="<?=$address;?>" />
	<div class="form-group has-feedback">
		<label class="control-label">Preference</label>
		<input type="text" class="form-control" name="preference" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">Zone</label>
		<select name="zone">
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
		<label class="control-label">Owner</label>
		<input type="text" name="owner" class="form-control" value="<?=htmlentities($user->get_user_name());?>" <?=($user->isAdmin())?"":"readonly"?> />
	</div>
</form>

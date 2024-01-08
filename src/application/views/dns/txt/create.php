<form method="POST" id="create-form">
	<div class="form-group has-feedback">
		<label class="control-label">Hostname</label>
		<select name="hostname" class="form-control">
			<?php
			foreach($aRecs as $aRec) {
				print "<option value=\"".htmlentities($aRec->get_hostname())."\">".htmlentities($aRec->get_hostname())."</option>";
			}
			?>
		</select>
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Zone</label>
		<select name="zone" class="form-control">
			<?php
			foreach($zones as $zone) {
				print "<option value=\"".htmlentities($zone->get_zone())."\">".htmlentities($zone->get_zone())."</option>";
			}
			?>
		</select>
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
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
	<div class="form-group">
		<label class="control-label">Owner</label>
		<input type="text" class="form-control" name="owner" value="<?=htmlentities($user->get_user_name());?>" <?=($user->isAdmin())?"":"readonly"?> />
	</div>
</form>

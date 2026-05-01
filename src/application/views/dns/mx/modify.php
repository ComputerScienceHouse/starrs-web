<form method="POST" id="modify-form">
	<div class="form-group has-feedback">
		<label class="control-label">Hostname</label>
		<select name="hostname" class="form-control">
			<?php
			foreach($aRecs as $aRec) {
				if($aRec->get_hostname() == $mRec->get_hostname()) {
					print "<option value=\"".htmlentities($aRec->get_hostname())."\" selected>".htmlentities($aRec->get_hostname())."</option>";
				}
				else {
					print "<option value=\"".htmlentities($aRec->get_hostname())."\">".htmlentities($aRec->get_hostname())."</option>";
				}
			}
			?>
		</select>
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Preference</label>
		<input type="text" class="form-control" name="preference" value="<?=htmlentities($mRec->get_preference())?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">Zone</label>
		<select name="zone" class="form-control">
			<?php
			foreach($zones as $zone) {
				if($mRec->get_zone() == $zone->get_zone()) {
					print "<option selected value=\"".htmlentities($zone->get_zone())."\">".htmlentities($zone->get_zone())."</option>";
				} else {
					print "<option value=\"".htmlentities($zone->get_zone())."\">".htmlentities($zone->get_zone())."</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label class="control-label">TTL</label>
		<input type="text" class="form-control" name="ttl" value="<?=htmlentities($mRec->get_ttl())?>" />
	</div>
	<div class="form-group">
		<label class="control-label">Owner</label>
		<input type="text" name="owner" class="form-control" value="<?=htmlentities($mRec->get_owner());?>" <?=($user->isAdmin())?"":"readonly"?> />
	</div>
</form>

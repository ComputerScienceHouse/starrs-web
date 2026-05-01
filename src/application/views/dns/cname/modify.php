<form method="POST" id="modify-form">
	<input type="hidden" name="address" value="<?=$address;?>" />
	<div class="form-group has-feedback">
		<label class="control-label">Alias</label>
		<input type="text" name="alias" class="form-control" value="<?=htmlentities($cRec->get_alias())?>" />&nbsp;<span id="inuse" class="label label-danger starrs-hide">In use!</span>
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">Zone</label>
		<select name="zone" class="form-control">
			<?php
			foreach($zones as $zone) {
				if($cRec->get_zone() == $zone->get_zone()) {
					print "<option selected value=\"".htmlentities($zone->get_zone())."\">".htmlentities($zone->get_zone())."</option>";
				} else {
					print "<option value=\"".htmlentities($zone->get_zone())."\">".htmlentities($zone->get_zone())."</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label class="control-label">Hostname</label>
		<select name="hostname" class="form-control">
			<?php
			foreach($aRecs as $aRec) {
				if($aRec->get_hostname() == $cRec->get_hostname()) {
					print "<option value=\"".htmlentities($aRec->get_hostname())."\" selected>".htmlentities($aRec->get_hostname())."</option>";
				}
				else {
					print "<option value=\"".htmlentities($aRec->get_hostname())."\">".htmlentities($aRec->get_hostname())."</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label class="control-label">TTL</label>
		<input type="text" name="ttl" class="form-control" value="<?=htmlentities($cRec->get_ttl())?>" />
	</div>
	<div class="form-group">
		<label class="control-label">Owner</label>
		<input type="text" name="owner" value="<?=htmlentities($cRec->get_owner());?>" <?=($user->isAdmin())?"":"readonly"?> class="form-control" />
	</div>
</form>

<form method="POST" id="modify-form">
	<div class="form-group has-feedback">
		<label class="control-label">FQDN</label>
		<input type="text" class="form-control" name="nameserver" value="<?=htmlentities($nRec->get_nameserver())?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Address</label>
		<input type="text" class="form-control" name="address" value="<?=htmlentities($nRec->get_address())?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group">
		<label class="control-label">Zone</label>
		<select name="zone">
			<?php
			foreach($zones as $zone) {
				if($nRec->get_zone() == $zone->get_zone()) {
					print "<option value=\"".htmlentities($zone->get_zone())."\" selected>".htmlentities($zone->get_zone())."</option>";
				}
				else {
					print "<option value=\"".htmlentities($zone->get_zone())."\">".htmlentities($zone->get_zone())."</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label class="control-label">TTL</label>
		<input type="text" class="form-control" name="ttl" value="<?=htmlentities($nRec->get_ttl())?>" />
	</div>
	<div class="alert alert-warning" role="alert">
		WARNING: The TTL specified (or default) here will also apply to all other NS records in your zone.
	</div>
</form>

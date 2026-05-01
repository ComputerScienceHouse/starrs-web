<form method="POST" id="create-form">
	<div class="form-group has-feedback">
		<label class="control-label">FQDN</label>
		<input type="text" class="form-control" name="nameserver" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<?php if(isset($address)) {?>
	<input type="hidden" name="address" value="<?=$address;?>" readonly />
	<?} else {?>
	<div class="form-group has-feedback">
		<label class="control-label">Address</label>
		<input type="text" class="form-control" name="address" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<?}?>
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
	<div class="alert alert-warning" role="alert">
		WARNING: The TTL specified (or default) here will also apply to all other NS records in your zone.
	</div>
</form>

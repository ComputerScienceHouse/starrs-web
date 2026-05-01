<form method="POST" id="create-form">
	<div class="form-group">
		<label class="control-label">Address</label>
		<select name="address" class="form-control">
			<?php
			foreach($intAddrs as $intAddr) {
				if($za->get_address() == $intAddr->get_address()) {
					print "<option selected value=\"{$intAddr->get_address()}\">".htmlentities($intAddr->get_address().' ('.$intAddr->get_system_name().')')."</option>";
				}
				else {
					print "<option value=\"{$intAddr->get_address()}\">".htmlentities($intAddr->get_address().' ('.$intAddr->get_system_name().')')."</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label class="control-label">Zone</label>
		<select name="zone" class="form-control">
			<option><?=$zone;?></option>
		</select>
	</div>
	<div class="form-group">
		<label class="control-label">TTL</label>
		<input type="text" class="form-control" name="ttl" value="<?=$za->get_ttl();?>" />
	</div>
</form>

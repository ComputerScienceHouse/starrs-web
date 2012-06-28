<form class="form-horizontal" id="create-form">
	<fieldset>
		<div class="control-group error">
			<label class="control-label">FQDN: </label>
			<div class="controls">
				<input type="text" name="nameserver" />
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Zone: </label>
			<div class="controls">
				<select name="zone">
					<?php
					foreach($zones as $zone) {
						print "<option value=\"{$zone->get_zone()}\">{$zone->get_zone()}</option>";
					}
					?>
				</select>
			</div>
		</div>
		<div class="control-group warning">
			<label class="control-label">TTL: </label>
			<div class="controls">
				<input type="text" name="ttl"></input>
				<p>WARNING: The TTL specified (or default) here will also apply to all other NS records in your zone.</p>
			</div>
		</div>
	</fieldset>
</form>

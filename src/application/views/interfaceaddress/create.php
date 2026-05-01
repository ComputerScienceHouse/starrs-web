<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Address</h3>
		</div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				You only need to specify either an IP address or a range. If a range is selected, an IP address will be automatically entered for you. If you enter an IP address, its range will be selected automatically. The rest of the fields typically do not need to be altered.
			</div>
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">Range</label>
					<select name="range" class="form-control">
						<option selected></option>
						<?php
						foreach($ranges as $range) {
							print "<option value=\"".htmlentities($range->get_name())."\">".htmlentities($range->get_name())." (".htmlentities($range->get_datacenter())."::".htmlentities($range->get_zone()).")</option>";
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Address</label>
					<input type="text" class="form-control" name="address" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Interface</label>
					<select name="mac" class="form-control">
						<?php
						foreach($ints as $int) {
							if($int->get_mac() == $mac) {
								print "<option value=\"".htmlentities($int->get_mac())."\" selected>".htmlentities($int->get_mac())." (".htmlentities($int->get_system_name()).")</option>";
							}
							else {
								print "<option value=\"".htmlentities($int->get_mac())."\">".htmlentities($int->get_mac())." (".htmlentities($int->get_system_name()).")</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Primary</label>
					<select name="isprimary" class="form-control">
						<option value='t'>Yes</option>
						<option value='f'>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Config</label>
					<select name="config" class="form-control">
						<?php
						foreach($configs as $conf) {
							print "<option value=".htmlentities($conf->get_config()).">".htmlentities($conf->get_config())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">DHCP Class</label>
					<select name="class" class="form-control">
						<?php
						foreach($classes as $class) {
							print "<option value=".htmlentities($class->get_class()).">".htmlentities($class->get_class())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Renew Date</label>
					<input type="text" class="form-control" name="renew_date" value="<?=$date;?>" <?($user->isAdmin())?"":"readonly";?> />
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-actions pull-right">
					<a href="/addresses/view/<?=rawurlencode($mac);?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Address" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

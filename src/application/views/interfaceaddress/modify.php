<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Address</h3>
		</div>
		<div class="panel-body">
			<div class="alert alert-info" role="alert">
				You only need to specify either an IP address or a range. If a range is selected, an IP address will be automatically entered for you. If you enter an IP address, its range will be selected automatically. The rest of the fields typically do not need to be altered.
			</div>
			<form method="POST" id="modify-form">
				<?if($intAddr->get_dynamic() == 'f') {?>
				<div class="form-group has-feedback">
					<label class="control-label">Range</label>
					<select name="range" class="form-control">
						<?php
						foreach($ranges as $range) {
							if($range->get_name() == $intAddr->get_range()) {
								print "<option value=\"".htmlentities($range->get_name())."\" selected>".htmlentities($range->get_name())." (".htmlentities($range->get_datacenter())."::".htmlentities($range->get_zone()).")</option>";
							}
							else {
								print "<option value=\"".htmlentities($range->get_name())."\">".htmlentities($range->get_name())." (".htmlentities($range->get_datacenter())."::".htmlentities($range->get_zone()).")</option>";
							}
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Address</label>
					<input type="text" class="form-control" name="address" value="<?=htmlentities($intAddr->get_address());?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<?} else {?>
				<input type="hidden" name="address" value="<?=htmlentities($intAddr->get_address());?>" />
				<?}?>
				<div class="form-group">
					<label class="control-label">Interface</label>
					<select name="mac" class="form-control">
						<?php
						foreach($ints as $int) {
							if($int->get_mac() != $currentInt->get_mac()) {
								print "<option value=\"".htmlentities($int->get_mac())."\">".htmlentities($int->get_mac())." (".htmlentities($int->get_system_name()).")</option>";

							}
						}
						print "<option value=\"".htmlentities($currentInt->get_mac())."\" selected>".htmlentities($currentInt->get_mac())." (".htmlentities($currentInt->get_system_name()).")</option>";
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Primary</label>
					<select name="isprimary" class="form-control">
						<?=$intAddr->get_isprimary();?>
						<option value='t' <?=($intAddr->get_isprimary()=='t')?"selected":null;?>>Yes</option>
						<option value='f' <?=($intAddr->get_isprimary()=='f')?"selected":null;?>>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Config</label>
					<select name="config" class="form-control">
						<?php
						foreach($configs as $conf) {
							if($intAddr->get_config() == $conf->get_config()) {
								print "<option value=".htmlentities($conf->get_config())." selected>".htmlentities($conf->get_config())."</option>";
							}
							else {
								print "<option value=".htmlentities($conf->get_config()).">".htmlentities($conf->get_config())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">DHCP Class</label>
					<select name="class" class="form-control">
						<?php
						foreach($classes as $class) {
							if($class->get_class() == $intAddr->get_class()) {
								print "<option value=".htmlentities($class->get_class())." selected>".htmlentities($class->get_class())."</option>";
							}
							else {							
								print "<option value=".htmlentities($class->get_class()).">".htmlentities($class->get_class())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Renew Date</label>
					<input type="text" class="form-control" name="renew_date" value="<?=htmlentities($intAddr->get_renew_date());?>" <?($user->isAdmin())?"":"readonly";?> />
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=htmlentities($intAddr->get_comment());?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/address/view/<?=rawurlencode($intAddr->get_address());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

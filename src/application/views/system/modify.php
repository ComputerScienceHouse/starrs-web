<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify System</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group has-feedback">
					<label class="control-label">System Name</label>
					<input type="text" class="form-control" name="systemName" value="<?=$sys->get_system_name();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Type</label>
					<select name="type" class="form-control">
						<?php
						foreach($sysTypes as $sysType) {
							if($sysType->get_type() == $sys->get_type()) {
								print "<option value=\"".htmlentities($sysType->get_type())."\" selected>".htmlentities($sysType->get_type())."</option>";	
							}
							else {
								print "<option value=\"".htmlentities($sysType->get_type())."\">".htmlentities($sysType->get_type())."</option>";	
							}
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Operating System</label>
					<select name="osName" class="form-control">
						<?php
						foreach($operatingSystems as $os) {
							if($os == $sys->get_os_name()) {
								print "<option value=\"".htmlentities($os)."\" selected>".htmlentities($os)."</option>";	
							}
							else {
								print "<option value=\"".htmlentities($os)."\">".htmlentities($os)."</option>";	
							}
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=htmlentities($sys->get_comment());?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Location</label>
					<input type="text" class="form-control" name="location" value="<?=htmlentities($sys->get_location());?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Asset</label>
					<input type="text" class="form-control" name="asset" value="<?=htmlentities($sys->get_asset());?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Platform</label>
					<select name="platform" class="form-control">
						<?
						foreach($platforms as $p) {
							if($p->get_platform_name() == $sys->get_platform()) {
								print "<option selected>".htmlentities($p->get_platform_name())."</option>";
							}
							else {
								print "<option>".htmlentities($p->get_platform_name())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Datacenter</label>
					<select name="datacenter" class="form-control">
						<?
						foreach($dcs as $dc) {
							if($dc->get_datacenter() == $sys->get_datacenter()) {
								print "<option selected>".htmlentities($dc->get_datacenter())."</option>";
							}
							else {
								print "<option>".htmlentities($dc->get_datacenter())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" <?=($isAdmin)?"":"readonly";?> value="<?=htmlentities($sys->get_owner());?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Group</label>
					<select name="group" class="form-control">
						<option></option>
						<?
						foreach($groups as $g) {
							if($g->get_group() == $sys->get_group()) {
								print "<option selected >".htmlentities($g->get_group())."</option>";
							}
							else {
								print "<option>".htmlentities($g->get_group())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-actions pull-right">
					<a href="/system/view/<?=rawurlencode($sys->get_system_name());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

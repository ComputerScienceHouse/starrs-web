<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create System</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">System Name</label>
					<input type="text" class="form-control" name="systemName" value="<?=$name?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Type</label>
					<select name="type" class="form-control">
						<option selected></option>
						<?php
						foreach($sysTypes as $sysType) {
							print "<option value=\"".htmlentities($sysType->get_type())."\">".htmlentities($sysType->get_type())."</option>";	
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Operating System</label>
					<select name="osName" class="form-control">
						<option selected></option>
						<?php
						foreach($operatingSystems as $os) {
							print "<option value=\"".htmlentities($os)."\">".htmlentities($os)."</option>";	
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-group">
					<label class="control-label">Location</label>
					<input type="text" class="form-control" name="location" />
				</div>
				<div class="form-group">
					<label class="control-label">Asset</label>
					<input type="text" class="form-control" name="asset" />
				</div>
				<div class="form-group">
					<label class="control-label">Platform</label>
					<select name="platform" class="form-control">
						<?
						foreach($platforms as $p) {
							print "<option>".htmlentities($p->get_platform_name())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Datacenter</label>
					<select name="datacenter" class="form-control">
						<?
						foreach($dcs as $dc) {
							print "<option>".htmlentities($dc->get_datacenter())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" <?=($user->isAdmin())?"":"readonly";?> value="<?=($user->isAdmin())?htmlentities($default_owner):htmlentities($user->get_user_name());?>" />
                    <?if($user->isAdmin()) {?>
                    <input type="hidden" class="form-control" disabled="true" name="username" value="<?=$user->get_user_name();?>" />
                    <?}?>
				</div>
				<div class="form-group">
					<label class="control-label">Group</label>
					<select name="group" class="form-control">
						<?
						foreach($groups as $g) {
							if($g->get_group() == $default_group) {
								print "<option selected>".htmlentities($g->get_group())."</option>";
							} else {
								print "<option>".htmlentities($g->get_group())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-actions pull-right">
					<a href="/systems/view" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create System" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

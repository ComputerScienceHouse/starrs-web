<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create System</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">System Name</label>
					<input type="text" class="form-control" name="system_name" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">MAC Address</label>
					<input type="text" class="form-control" name="mac" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
					<?if($random) {?>
					<a href="#" class="btn" id="random-mac">Random</a>
					<div id="mac-warning" class="alert hidden" style="margin-top: 1em; margin-bottom: 0em;">Heads Up! You should only use a random MAC address when you do not have access to the system's actual MAC address.</div>
					<?}?>
				</div>
				<div class="alert alert-info" role="alert">
					You only need to specify either an IP address or a range. If a range is selected, an IP address will be automatically entered for you. If you enter an IP address, its range will be selected automatically. The rest of the fields typically do not need to be altered.
				</div>
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
				<div class="form-group">
					<label class="control-label">Address</label>
					<input type="text" class="form-control" name="address" />
				</div>
				<div class="form-group">
					<label class="control-label">Config</label>
					<?if($random) {?>
                    	<input type="hidden" name="config" value="static" />
                    	<?}?>
					<select name="config" class="form-control"<?=($random)?" disabled":""?>>
						<?php
						foreach($configs as $c) {
							print "<option>".htmlentities($c->get_config())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Create DNS</label>
					<?if($random) {?>
		               <input type="hidden" name="quickdns" value="<?=$dns;?>" />
		               <?}?>
					<select name="quickdns" class="form-control"<?=($random)?" disabled":""?>>
						<option <?=($dns=='yes'?"selected":"")?>>Yes</option>
						<option <?=($dns=='no'?"selected":"")?>>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Zone</label>
					<select name="zone" class="form-control"<?=($dns=='no'?" readonly":"")?>>
						<?php
						foreach($zones as $z) {
							print "<option>".htmlentities($z->get_zone())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" <?=($user->isAdmin())?"":"readonly";?> value="<?=($user->isAdmin())?htmlentities($default_owner):htmlentities($user->get_user_name());?>" />
                    <?if($user->isAdmin()) {?>
					<!-- <a href="#" class="btn btn-default" id="me-button">Me</a> -->
					<input type="hidden" disabled=true name="username" value="<?=$user->get_user_name();?>" />
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

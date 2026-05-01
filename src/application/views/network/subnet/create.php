<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Subnet</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">Name</label>
					<input type="text" class="form-control" name="name" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">CIDR Subnet</label>
					<input type="text" class="form-control" name="subnet" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Zone</label>
					<select name="zone" class="form-control">
						<?php
						foreach($zones as $z) {
							print "<option>".htmlentities($z->get_zone())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Datacenter</label>
					<select name="datacenter" class="form-control">
						<option></option>
						<?php
						foreach($dcs as $dc) {
							print "<option>".htmlentities($dc->get_datacenter())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">VLAN</label>
					<select name="vlan" class="form-control">
						<option></option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">DHCP Enable</label>
					<select name="dhcp_enable" class="form-control">
						<option value="t">Yes</option>
						<option value="f">No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Autogen</label>
					<select name="autogen" class="form-control">
						<option value="t">Yes</option>
						<option value="f">No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" <?=($user->isAdmin())?"":"readonly";?> value="<?=htmlentities($user->get_user_name());?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/network/subnets/view" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Subnet" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

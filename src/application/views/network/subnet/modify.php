<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Subnet</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<input type="hidden" name="datacenter" value="<?=$snet->get_datacenter();?>" />
				<div class="form-group has-feedback">
					<label class="control-label">Name</label>
					<input type="text" class="form-control" name="name" value="<?=$snet->get_name();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">CIDR Subnet</label>
					<input type="text" class="form-control" name="subnet" value="<?=$snet->get_subnet();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Zone</label>
					<select name="zone" class="form-control">
						<?php
						foreach($zones as $z) {
							if($z->get_zone() == $snet->get_zone()) {
								print "<option selected>".htmlentities($z->get_zone())."</option>";
							}
							else {
								print "<option>".htmlentities($z->get_zone())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Datacenter</label>
					<select name="datacenter" class="form-control">
						<?php
						foreach($dcs as $dc) {
							if($dc->get_datacenter() == $snet->get_datacenter()) {
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
					<label class="control-label">VLAN</label>
					<select name="vlan" class="form-control">
						<?php
						foreach($vlans as $v) {
							if($v->get_vlan() == $snet->get_vlan()) {
								print "<option selected>".htmlentities($v->get_vlan())."</option>";
							}
							else {
								print "<option>".htmlentities($v->get_vlan())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">DHCP Enable</label>
					<select name="dhcp_enable" class="form-control">
						<!--
						<?
						if($snet->get_dhcp_enable()=='t') {
							print "<option value='t' selected>Yes</option>";
							print "<option value='f'>No</option>";
						} else {
							print "<option value='t'>Yes</option>";
							print "<option value='f' selected>No</option>";
						}
						?>
						-->
						<option value='t' <?=($snet->get_dhcp_enable()=='t')?"selected":'';?>>Yes</option>
						<option value='f' <?=($snet->get_dhcp_enable()=='f')?"selected":'';?>>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Autogen</label>
					<select name="autogen" class="form-control">
						<option value=t <?=($snet->get_autogen()=='t')?"selected":'';?>>Yes</option>
						<option value=f <?=($snet->get_autogen()=='f')?"selected":'';?>>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=$snet->get_comment();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" value="<?=$snet->get_owner();?>" <?=(!$isAdmin)?"readonly":'';?> />
				</div>
				<div class="form-actions pull-right">
					<a href="/network/subnet/view/<?=rawurlencode($snet->get_subnet())?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

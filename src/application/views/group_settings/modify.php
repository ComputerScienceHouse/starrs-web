<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Group Provider Settings</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">Group Name</label>
					<input type="text" class="form-control" name="group" value="<?=$g->get_group();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">User Privilege</label>
					<select name="privilege" class="form-control">
						<option <?=($gset->get_privilege() == 'USER')?"selected":"";?> >USER</option>
						<option <?=($gset->get_privilege() == 'ADMIN')?"selected":"";?> >ADMIN</option>
						<option <?=($gset->get_privilege() == 'PROGRAM')?"selected":"";?> >PROGRAM</option>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Provider</label>
					<select name="provider" class="form-control">
						<option <?=($gset->get_provider() == 'vcloud')?"selected":"";?> >vcloud</option>
						<option <?=($gset->get_provider() == 'ldap')?"selected":"";?> >ldap</option>
						<option <?=($gset->get_provider() == 'local')?"selected":"";?> >local</option>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Hostname</label>
					<input type="text" class="form-control" name="hostname" value="<?=$gset->get_hostname();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">ID</label>
					<input type="text" class="form-control" name="id" value="<?=$gset->get_id();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Username</label>
					<input type="text" class="form-control" name="username" value="<?=$gset->get_username();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" class="form-control" name="password" value="<?=$gset->get_password();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/group/view/<?=rawurlencode($g->get_group());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

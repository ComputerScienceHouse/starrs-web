<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Group Provider Settings</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">Group Name</label>
					<input type="text" class="form-control" name="group" value="<?=htmlentities($g->get_group())?>" readonly />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">User Privilege</label>
					<select name="privilege" class="form-control">
						<option>USER</option>
						<option>ADMIN</option>
						<option>PROGRAM</option>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Provider</label>
					<select name="provider" class="form-control">
						<option>ldap</option>
						<option>local</option>
						<option>vcloud</option>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Hostname</label>
					<input type="text" class="form-control" name="hostname" />
				</div>
				<div class="form-group">
					<label class="control-label">ID</label>
					<input type="text" class="form-control" name="id" />
				</div>
				<div class="form-group">
					<label class="control-label">Username</label>
					<input type="text" class="form-control" name="username" />
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<div class="form-actions pull-right">
					<a href="/group/view/<?=rawurlencode($g->get_group())?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Settings" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

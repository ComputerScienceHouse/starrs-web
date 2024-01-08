<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Group</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">Group Name</label>
					<input type="text" class="form-control" name="group" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Global Privilege</label>
					<select name="privilege" class="form-control">
						<option>USER</option>
						<option>ADMIN</option>
						<option>PROGRAM</option>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-group">
					<label class="control-label">Default Renew Interval</label>
					<input type="text" class="form-control" name="renew" />
				</div>
				<div class="form-actions pull-right">
					<a href="/groups/view" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Group" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

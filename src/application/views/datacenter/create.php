<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Datacenter</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">Datacenter Name</label>
					<input type="text" class="form-control" name="name" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-actions pull-right">
					<a href="/datacenters/view" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Datacenter" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

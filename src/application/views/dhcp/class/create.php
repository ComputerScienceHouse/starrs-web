<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Class</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group">
					<label class="control-label">Class Name</label>
					<input type="text" class="form-control" name="class" />
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-actions pull-right">
					<a href="/dhcp/classes/view" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Class" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

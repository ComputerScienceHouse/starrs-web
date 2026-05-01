<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Platform</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">Platform Name</label>
					<input type="text" class="form-control" name="platform_name" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Architecture</label>
					<select name="architecture" class="form-control">
						<?
						foreach($architectures as $arch) {
							print "<option>".htmlentities($arch)."</option>";
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Disk</label>
					<input type="text" class="form-control" name="disk" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">CPU</label>
					<input type="text" class="form-control" name="cpu" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Memory (MB)</label>
					<input type="text" class="form-control" name="memory" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-actions pull-right">
					<a href="/platforms/view" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Platform" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Host</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">System</label>
					<select name="system_name" class="form-control">
						<option selected></option>
						<?php
						foreach($systems as $sys) {
							print "<option>".htmlentities($sys->get_system_name())."</option>";
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">URI</label>
					<input type="text" class="form-control" name="uri" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Password</label>
					<input type="password" class="form-control" name="password" />
				</div>
				<div class="form-actions pull-right">
					<a href="/libvirt/hosts/view" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Host" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

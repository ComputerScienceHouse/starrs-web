<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Add Domain To Host</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group">
					<label class="control-label">System</label>
					<select name="domain">
						<option selected></option>
						<?php
							foreach($systems as $sys) {
								print "<option>".htmlentities($sys->get_system_name())."</option>";
							}
						?>
					</select>
				</div>
				<div class="form-actions pull-right">
					<a href="/libvirt/hosts/view" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Add Domain" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

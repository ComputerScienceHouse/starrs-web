<form method="POST" id="create-form">
	<div class="form-group has-feedback">
		<label class="control-label">Action</label>
		<div class="controls">
			<select name="action" class="form-control">
				<option value="create">Power On</option>
				<option value="destroy">Force Off</option>
				<option value="reset">Force Reset</option>
				<option value="reboot">Reboot (ACPI)</option>
				<option value="suspend">Pause</option>
				<option value="resume">Resume</option>
			</select>
		</div>
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
</form>

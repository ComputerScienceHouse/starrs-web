<form method="POST" id="modify-form">
	<div class="form-group has-feedback">
		<label class="control-label">Option</label>
		<input type="text" class="form-control" name="option" value="<?=$opt->get_option();?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label">Value</label>
		<input type="text" class="form-control" name="value" value="<?=$opt->get_value();?>" />
		<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
	</div>
</form>

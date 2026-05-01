<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Availability Zone</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group">
					<label class="control-label">Datacenter Name</label>
					<select name="datacenter" class="form-control">
					<?php
					foreach($dcs as $dc) {
						if($dc->get_datacenter() == $az->get_datacenter()) {
							print "<option selected>".htmlentities($dc->get_datacenter())."</option>";
						}
						else {
							print "<option>".htmlentities($dc->get_datacenter())."</option>";
						}
					}
					?>
					</select>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Zone</label>
					<input type="text" class="form-control" name="zone" value="<?=$az->get_zone();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=$az->get_comment();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/datacenter/view/<?=rawurlencode($az->get_datacenter());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Interface</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group has-feedback">
					<label class="control-label">System Name</label>
					<select name="systemName" class="form-control">
						<?php
						foreach($systems as $sys) {
							if($sys->get_system_name() == $int->get_system_name()) {
								print "<option value=\"".htmlentities($sys->get_system_name())."\" selected>".htmlentities($sys->get_system_name())."</option>";
							}
							else {
								print "<option value=\"".htmlentities($sys->get_system_name())."\">".htmlentities($sys->get_system_name())."</option>";
							}
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Interface Name</label>
					<input type="text" class="form-control" name="name" value="<?=htmlentities($int->get_name());?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">MAC Address</label>
					<input type="text" class="form-control" name="mac" value="<?=htmlentities($int->get_mac());?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=htmlentities($int->get_comment());?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/interface/view/<?=rawurlencode($int->get_mac());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

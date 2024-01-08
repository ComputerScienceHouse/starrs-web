<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Range</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<input type="hidden" name="datacenter" value="<?=$r->get_datacenter();?>" />
				<div class="form-group has-feedback">
					<label class="control-label">Name</label>
					<input type="text" class="form-control" name="name" value="<?=$r->get_name();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">First IP</label>
					<input type="text" class="form-control" name="firstip" value="<?=$r->get_first_ip();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Last IP</label>
					<input type="text" class="form-control" name="lastip" value="<?=$r->get_last_ip();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Use</label>
					<select name="use" class="form-control">
						<?php
						foreach($uses as $use) {
							if($use == $r->get_use()) {
								print "<option selected>".htmlentities($use)."</option>";
							}
							else {
								print "<option>".htmlentities($use)."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">DHCP Class</label>
					<select name="class" class="form-control">
						<option></option>
						<?php
						foreach($classes as $c) {
							if($r->get_class() == $c->get_class()) {
								print "<option selected>".htmlentities($c->get_class())."</option>";
							}
							else {
								print "<option>".htmlentities($c->get_class())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Availability Zone</label>
					<select name="zone" class="form-control">
						<?php
						foreach($azs as $az) {
							if($az->get_zone() == $r->get_zone()) {
								print "<option selected>".htmlentities($az->get_zone())."</option>";
							}
							else {
								print "<option>".htmlentities($az->get_zone())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=$r->get_comment();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/network/range/view/<?=rawurlencode($r->get_name());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

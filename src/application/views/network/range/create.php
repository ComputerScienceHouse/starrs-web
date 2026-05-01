<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Range</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<input type="hidden" name="datacenter" value="<?=$snet->get_datacenter();?>" />
				<div class="form-group has-feedback">
					<label class="control-label">Name</label>
					<input type="text" class="form-control" name="name" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">First IP</label>
					<input type="text" class="form-control" name="firstip" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Last IP</label>
					<input type="text" class="form-control" name="lastip" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Use</label>
					<select name="use" class="form-control">
						<?php
						foreach($uses as $use) {
							print "<option>".htmlentities($use)."</option>";
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
							print "<option>".htmlentities($c->get_class())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Availability Zone</label>
					<select name="zone" class="form-control">
						<?php
						foreach($azs as $az) {
							print "<option>".htmlentities($az->get_zone())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-actions pull-right">
					<a href="/network/subnet/view/<?=rawurlencode($snet->get_subnet());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Range" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Platform</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group has-feedback">
					<label class="control-label">Platform Name</label>
					<input type="text" class="form-control" name="platform_name" value="<?=$p->get_platform_name();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Architecture</label>
					<select name="architecture" class="form-control">
						<?
						foreach($architectures as $arch) {
							if($p->get_architecture() == $arch) {
								print "<option selected>".htmlentities($arch)."</option>";
							} else {
								print "<option>".htmlentities($arch)."</option>";
							}
						}
						?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Disk</label>
					<input type="text" class="form-control" name="disk" value="<?=$p->get_disk();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">CPU</label>
					<input type="text" class="form-control" name="cpu" value="<?=$p->get_cpu();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Memory (MB)</label>
					<input type="text" class="form-control" name="memory" value="<?=$p->get_memory();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-actions pull-right">
					<a href="/platform/view/<?=rawurlencode($p->get_platform_name());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

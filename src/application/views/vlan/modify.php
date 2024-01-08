<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify VLAN</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group has-feedback">
					<label class="control-label">Datacenter</label>
					<select name="datacenter" class="form-control">
					<?
					foreach($dcs as $dc) {
						if($dc->get_datacenter() == $v->get_datacenter()) {
							print "<option selected>".htmlentities($dc->get_datacenter())."</option>";
						} else {
							print "<option>".htmlentities($dc->get_datacenter())."</option>";
						}
					}
					?>
					</select>
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Number</label>
					<input type="text" class="form-control" name="vlan" value="<?=$v->get_vlan();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Name</label>
					<input type="text" class="form-control" name="name" value="<?=$v->get_name();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=$v->get_comment();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/network/vlan/view/<?=rawurlencode($v->get_datacenter());?>/<?=rawurlencode($v->get_vlan());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

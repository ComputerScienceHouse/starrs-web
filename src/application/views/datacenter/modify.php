<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Datacenter</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group has-feedback">
					<label class="control-label">Datacenter Name</label>
					<input type="text" class="form-control" name="name" value="<?=$dc->get_datacenter();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=$dc->get_comment();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/datacenter/view/<?=rawurlencode($dc->get_datacenter());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

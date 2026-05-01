<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Key</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group has-feedback">
					<label class="control-label">Key Name</label>
					<input type="text" class="form-control" name="keyname" value="<?=$key->get_keyname();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Key</label>
					<input type="text" class="form-control" name="key" value="<?=$key->get_key();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">Encryption Algorithm</label>
					<input type="text" class="form-control" name="enctype" value="<?=$key->get_enctype();?>" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=$key->get_comment();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" <?=($isAdmin)?"":"readonly";?> value="<?=$key->get_owner();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/dns/key/view/<?=rawurlencode($key->get_keyname());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

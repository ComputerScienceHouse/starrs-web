<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Class</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group">
					<label class="control-label">Class Name</label>
					<input type="text" class="form-control" name="class" value="<?=$c->get_class();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=$c->get_comment();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/dhcp/class/view/<?=rawurlencode($c->get_class());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Class" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

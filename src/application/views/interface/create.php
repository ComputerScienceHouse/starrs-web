<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Interface</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group has-feedback">
					<label class="control-label">Interface Name</label>
					<input type="text" class="form-control" name="name" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label">MAC Address</label>
					<input type="text" class="form-control" name="mac" />
					<span class="glyphicon glyphicon-asterisk form-control-feedback required"></span>
					<?if($random) {?>
					<a href="#" class="btn" id="random-mac">Random</a>
					<div id="mac-warning" class="alert alert-warning hidden" style="margin-top: 1em; margin-bottom: 0em;">Heads Up! You should only use a random MAC address when you do not have access to the system's actual MAC address.</div>
					<?}?>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-actions pull-right">
					<a href="/interfaces/view/<?=rawurlencode($systemName);?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Interface" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

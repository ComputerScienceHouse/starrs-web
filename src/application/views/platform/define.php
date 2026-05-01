<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Define Platform</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group">
					<label class="control-label">XML Definition</label>
					<textarea style="width: 80%" rows="20" name="definition"></textarea>
				</div>
				<div class="form-actions pull-right">
					<a href="/platform/view/<?=rawurlencode($p->get_platform_name());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Define" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

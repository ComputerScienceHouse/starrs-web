<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Create Zone</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="create-form">
				<div class="form-group">
					<label class="control-label">Zone</label>
					<input type="text" class="form-control" name="zone" />
				</div>
				<div class="form-group">
					<label class="control-label">Key</label>
					<select name="key" class="form-control">
						<option selected></option>
						<?
						foreach($keys as $k) {
							print "<option>".htmlentities($k->get_keyname())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Forward</label>
					<select name="forward" class="form-control">
						<option value='true'>Yes</option>
						<option value='false'>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Shared</label>
					<select name="shared" class="form-control">
						<option value='true'>Yes</option>
						<option value='false'>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">DDNS</label>
					<select name="ddns" class="form-control">
						<option value='false'>No</option>
						<option value='true'>Yes</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" />
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" <?=($user->isAdmin())?"":"readonly";?> value="<?=htmlentities($user->get_user_name());?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/dns/zone" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Zone" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

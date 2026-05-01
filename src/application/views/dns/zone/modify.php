<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify Zone</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group">
					<label class="control-label">Zone</label>
					<input type="text" class="form-control" name="zone" value="<?=$z->get_zone();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Key</label>
					<select name="keyname" class="form-control">
						<?
						foreach($keys as $k) {
							if($k->get_keyname() == $z->get_keyname()) {
								print "<option selected>".htmlentities($k->get_keyname())."</option>";
							}
							else {
								print "<option>".htmlentities($k->get_keyname())."</option>";
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Forward</label>
					<select name="forward" class="form-control">
						<option value='t' <?=($z->get_forward()=='t')?"selected":'';?>>Yes</option>
						<option value='f' <?=($z->get_forward()=='f')?"selected":'';?>>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Shared</label>
					<select name="shared" class="form-control">
						<option value='t' <?=($z->get_shared()=='t')?"selected":'';?>>Yes</option>
						<option value='f' <?=($z->get_shared()=='f')?"selected":'';?>>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">DDNS</label>
					<select name="ddns" class="form-control">
						<option value='t' <?=($z->get_ddns()=='t')?"selected":'';?>>Yes</option>
						<option value='f' <?=($z->get_ddns()=='f')?"selected":'';?>>No</option>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Comment</label>
					<input type="text" class="form-control" name="comment" value="<?=$z->get_comment();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" <?=($isAdmin)?"":"readonly";?> value="<?=$z->get_owner();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/dns/zone/view/<?=rawurlencode($z->get_zone());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Create Zone" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

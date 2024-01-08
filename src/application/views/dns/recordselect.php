<form>
	<div class="form-group">
		<label class="control-label">Record Type</label>
		<select name="rectype" class="form-control">
			<?php
			foreach($types as $type) {
				print "<option value=\"".htmlentities($type)."\">".htmlentities($type)."</option>";
			}
			?>
		</select>
		<input type="hidden" name="address" value="<?=$address;?>" />
	</div>
</form>

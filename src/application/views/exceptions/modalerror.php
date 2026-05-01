<div class="alert alert-danger starrs-modal-alert">
	<h4>Fatal error(s):</h4>
	<?php
	if(is_array($exception)) {
		foreach($exception as $e) {
			print htmlentities($e->getMessage());
		}
	}
	else {
		print htmlentities($exception->getMessage());
	}
	?>
</div>

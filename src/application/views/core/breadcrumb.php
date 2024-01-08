<ol class="breadcrumb">
	<li><a href="/">Home</a></li>
	<?php
	if($segments) {
		foreach(array_keys($segments) as $segment) {
			echo "<li><a href=\"$segments[$segment]\">".htmlentities($segment)."</a></li>";
		}
	}
	?>
</ol>

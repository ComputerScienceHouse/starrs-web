<div class="col-md-3 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-body">	
			<ul class="nav nav-list">
			<?php
				foreach($items as $item) {
					echo "<li><a href=\"{$item['link']}\">".htmlentities($item['text'])."</a></li>";
				}
			?>
			</ul>
		</div>
	</div>
</div>

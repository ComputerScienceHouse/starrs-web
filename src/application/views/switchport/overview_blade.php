<div class="col-md-9 col-md-pull-3 col-sm-12">
	<?php foreach($blades as $blade) { ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<?php
					foreach($blade->get_rows() as $rowNum) {
						print $blade->renderRow($rowNum);
					}
				?>
			</div>
		</div>
	</div>
	<?php } ?>
</div>

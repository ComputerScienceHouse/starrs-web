<div class="col-md-<?=(isset($span))?$span:6;?> col-sm-12">
	<div class="alert alert-danger">
		<h4>Whoops! An error occured.</h4>
		<p>Message: <?=htmlentities($exception->getMessage());?></p>
		<p>Type: <?=get_class($exception);?></p>
	</div>
</div>

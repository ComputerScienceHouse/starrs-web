<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="/system/view/<?=rawurlencode($dom->get_system_name())?>"><?=$dom->get_system_name();?></a> <small><?=$dom->get_state();?> on <a href="/system/view/<?=rawurlencode($dom->get_host_name())?>"><?=$dom->get_host_name();?></a></small></h3>
		</div>
		<div class="panel-body">
			<h2>Definition</h2>
			<pre>
			<?=htmlentities($dom->get_definition());?>
			</pre>
		</div>
	</div>
</div>

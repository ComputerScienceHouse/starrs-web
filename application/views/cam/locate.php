<div class="col-md-6 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>System</dt>
				<dd><a href="/system/view/<?=rawurlencode($p->get_system_name());?>"><?=$p->get_system_name();?></a></dd>
				<dt>Interface</dt>
				<dd><a href="/network/switchports/view/<?=rawurlencode($p->get_system_name());?>"><?=$p->get_name();?></a></dd>
			</dl>
		</div>
	</div>
</div>

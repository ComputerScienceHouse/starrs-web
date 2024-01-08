<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?=htmlentities($p->get_platform_name());?></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Architecture</dt>
				<dd><?=htmlentities($p->get_architecture());?></dd>
				<dt>Disk</dt>
				<dd><?=htmlentities($p->get_disk());?></dd>
				<dt>CPU</dt>
				<dd><?=htmlentities($p->get_cpu());?></dd>
				<dt>Memory</dt>
				<dd><?=htmlentities($p->get_memory());?></dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($p->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($p->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($p->get_last_modifier());?></dd>
			</dl>
		</div>
	</div>
</div>

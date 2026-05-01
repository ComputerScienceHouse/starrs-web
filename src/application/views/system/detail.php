<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">System: <?=htmlentities($sys->get_system_name());?></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Datacenter</dt>
				<dd><a href="/datacenter/view/<?=rawurlencode($sys->get_datacenter());?>"><?=htmlentities($sys->get_datacenter());?></a></dd>
				<dt>Type</dt>
				<dd><?=htmlentities($sys->get_type());?></dd>
				<dt>Operating System</dt>
				<dd><?=htmlentities($sys->get_os_name());?></dd>
				<dt>Owner</dt>
				<dd><a href="/users/view/<?=rawurlencode($sys->get_owner());?>"><?=htmlentities($sys->get_owner());?></a></dd>
				<dt>Group</dt>
				<dd><a href="/group/view/<?=rawurlencode($sys->get_group());?>"><?=htmlentities($sys->get_group());?></a>&nbsp</dd>
				<dt>Asset</dt>
				<dd><?=htmlentities($sys->get_asset());?>&nbsp</dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($sys->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($sys->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($sys->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($sys->get_comment());?>&nbsp;</dd>
				<dt>Location</dt>
				<dd><?=htmlentities($sys->get_location());?>&nbsp;</dd>
			</dl>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Platform</h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Platform</dt>
				<dd><?=htmlentities($p->get_platform_name());?></dd>
				<dt>Architecture</dt>
				<dd><?=htmlentities($p->get_architecture());?></dd>
				<dt>Disk</dt>
				<dd><?=htmlentities($p->get_disk());?></dd>
				<dt>CPU</dt>
				<dd><?=htmlentities($p->get_cpu());?></dd>
				<dt>Memory</dt>
				<dd><?=htmlentities($p->get_memory());?> GB</dd>
			</dl>
		</div>
	</div>
</div>

<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?=htmlentities($sys->get_system_name());?></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Address</dt>
				<dd><?=htmlentities($snmp->get_address());?></dd>
				<dt>RO Community</dt>
				<dd><?=htmlentities($snmp->get_ro_community());?>&nbsp;</dd>
				<dt>RW Community</dt>
				<dd><?=htmlentities($snmp->get_rw_community());?>&nbsp;</dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($snmp->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($snmp->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($snmp->get_last_modifier());?></dd>
			</dl>
		</div>
	</div>
</div>

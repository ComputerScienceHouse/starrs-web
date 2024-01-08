<div class="col-md-6 col-md-pull-3 col-xs-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">VLAN: <?=htmlentities($v->get_vlan());?></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Name</dt>
				<dd><?=htmlentities($v->get_name());?></dd>
				<dt>Datacenter</dt>
				<dd><?=htmlentities($v->get_datacenter());?></dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($v->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($v->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($v->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($v->get_comment());?>&nbsp;</dd>
			</dl>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Subnets</h3>
		</div>
		<div class="panel-body">
			<ul>
		        <? foreach($snets as $snet) {
		            print "<li><a href=\"/network/subnet/view/".rawurlencode($snet->get_subnet())."\">".htmlentities($snet->get_subnet())." (".htmlentities($snet->get_name()).")</a></li>";
		        }?>
		    </ul>
		</div>
	</div>
</div>

<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="/network/subnet/view/<?=rawurlencode($snet->get_subnet());?>"><?=htmlentities($snet->get_subnet());?></h2></a></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Name</dt>
				<dd><?=htmlentities($snet->get_name());?>&nbsp;</dd>
				<dt>DNS Zone</dt>
				<dd><a href="/dns/zone/view/<?=rawurlencode($snet->get_zone());?>"><?=htmlentities($snet->get_zone());?></a>&nbsp;</dd>
				<dt>Datacenter</dt>
				<dd><a href="/datacenter/view/<?=rawurlencode($snet->get_datacenter());?>"><?=htmlentities($snet->get_datacenter());?></a>&nbsp;</dd>
				<dt>VLAN</dt>
				<dd><a href="/network/vlan/view/<?=rawurlencode($snet->get_datacenter())."/".rawurlencode($snet->get_vlan());?>"><?=htmlentities($snet->get_vlan());?></a>&nbsp;</dd>
				<dt>DHCP Enable</dt>
				<dd><?=htmlentities(($snet->get_dhcp_enable()=='t')?'Yes':'No');?></dd>
				<dt>Autogen</dt>
				<dd><?=htmlentities(($snet->get_autogen()=='t')?'Yes':'No');?></dd>
				<dt>Owner</dt>
				<dd><?=htmlentities($snet->get_owner());?></dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($snet->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($snet->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($snet->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($snet->get_comment());?>&nbsp;</dd>
			</dl>
		</div>
	</div>
</div>
<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Utilization</h3>
		</div>
		<div class="panel-body">
			<script type="text/javascript" src="https://www.google.com/jsapi"></script>
			<script type="text/javascript">
				google.load("visualization", "1", {packages:["corechart"]});
				google.setOnLoadCallback(drawChart);
				function drawChart() {
					var data = google.visualization.arrayToDataTable([
						['Category', 'Quantity'],
						['Free',	  <?=$stat->free;?>],
						['In Use',	<?=$stat->inuse;?>]
					]);
	
					var options = {
						backgroundColor: '#f5f5f5',
						colors:['#49AFCD','#DA4F49']
					};
	
					var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
					chart.draw(data, options);
				}
			</script>
			<div id="chart_div" style="width: 100%"></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Ranges</h3>
			</div>
			<div class="panel-body">
				<ul>
					<?
					foreach($ranges as $r) {
						print "<li><a href=\"/network/range/view/".rawurlencode($r->get_name())."\">".htmlentities($r->get_first_ip())." - ".htmlentities($r->get_last_ip())." (".htmlentities($r->get_name()).")</a></li>";
					}
					?>
				</ul>
			</div>
		</div>
	</div>
</div>

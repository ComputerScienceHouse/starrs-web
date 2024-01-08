<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="/system/view/<?=rawurlencode($sys->get_system_name());?>"><?=htmlentities($sys->get_system_name());?></a><span class="pull-right"><?=($cam)?$cam[0]->get_date_created():"No CAM data";?></span></h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped datatable" id="camtable">
					<thead>
						<tr>
							<th>MAC Address</th>
							<th>Port Name</th>
							<th>VLAN</th>
						</tr>
					</thead>
					<tbody>
						<?
						foreach($cam as $c) {
							print "<tr><td><a href=\"/interface/view/".rawurlencode($c->get_mac())."\">{$c->get_mac()}</a></td><td><a class=\"switchport-link\" href=\"/network/switchport/view/".rawurlencode($sys->get_system_name())."/".rawurlencode($c->get_switchport()->get_index())."\">{$c->get_switchport()->get_name()}</a></td><td><a href=\"/network/vlan/view/".rawurlencode($sys->get_datacenter())."/".rawurlencode($c->get_switchport()->get_vlan())."\">{$c->get_switchport()->get_vlan()}</a></td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

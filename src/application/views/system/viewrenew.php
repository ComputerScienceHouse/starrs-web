<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Systems</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered datatable">
					<thead>
						<tr>
							<th>System Name</th>
							<th>Addresses</th>
							<th style="width: 76px">Renew Date</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?
						foreach($intAddrs as $intAddr) {
							print "<tr><td><a href=\"/system/view/".rawurlencode($intAddr->get_system_name())."\">".htmlentities($intAddr->get_system_name()).
							"</a></td><td><a href=\"/address/view/".rawurlencode($intAddr->get_address())."\">".htmlentities($intAddr->get_address())."</a></td><td>".htmlentities($intAddr->get_renew_date()).
							"</td><td><div class=\"btn-group\"><a class=\"btn btn-sm btn-info renew\" href=\"/address/renew/".rawurlencode($intAddr->get_address())."\">Renew</a><a class=\"btn btn-sm btn-danger renewremove\" href=\"/address/remove/".rawurlencode($intAddr->get_address())."\">Remove</a></div></td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

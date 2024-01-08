<div class="col-md-9 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Site Configuration</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered datatable">
					<thead>
						<tr>
							<th>Option</th>
							<th>Value</th>
							<th style="width: 220px;">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?
						foreach($confs as $c) {
							print "<tr><td>".htmlentities($c->get_option())."</td><td>".
								 htmlentities($c->get_value())."</td><td>
								 <a href=\"/configuration/view/".rawurlencode($c->get_option()).
								 "\"><button class=\"btn btn-sm btn-info\">Detail</button></a>
								 <a href=\"/configuration/modify/".rawurlencode($c->get_option()).
								 "\"><button class=\"btn btn-sm btn-warning\">Modify</button></a>
								 <a href=\"/configuration/remove/".rawurlencode($c->get_option()).
								 "\"><button class=\"btn btn-sm btn-danger\">Remove</button></a>
								 </td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

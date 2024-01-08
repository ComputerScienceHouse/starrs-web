<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="/system/view/<?=rawurlencode($sys->get_system_name());?>"><?=htmlentities($sys->get_system_name());?></a><span class="pull-right"><?=($ifs)?$ifs[0]->get_date_modified():"No CAM data";?></span></h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped datatable">
				    <thead>
				        <tr>
		        		    <th>Name</th>
		        		    <th>Admin State</th>
		        		    <th>Operational State</th>
		        		    <th>Alias</th>
		        		</tr>
				    </thead>
				    <tbody>
				        <?
		        		$up = "<span class=\"label label-success\">Up</span>";
		        		$down = "<span class=\"label label-default\">Down</span>";
		        		$disabled= "<span class=\"label label-danger\">Disabled</span>";
		        		foreach($ifs as $if) {
		        			print "<tr><td>{$if->get_name()}</td><td>".(($if->get_admin_state()=='t')?$up:$disabled)."</td><td>".(($if->get_oper_state()=='t')?$up:$down)."</td><td>{$if->get_alias()}</td></tr>";
		        		}
		        		?>
				    </tbody>
		    	</table>
		    </div>
		</div>
	</div>
</div>

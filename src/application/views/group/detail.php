<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?=htmlentities($g->get_group());?></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Global Privilege</dt>
				<dd><?=htmlentities($g->get_privilege());?></dd>
				<dt>Renew Interval</dt>
				<dd><?=htmlentities($g->get_renew());?></dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($g->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($g->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($g->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($g->get_comment());?>&nbsp;</dd>
			</dl>
		</div>
	</div>

	<?if($gset) {?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Provider Settings</h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Privilege</dt>
				<dd><?=htmlentities($gset->get_privilege());?></dd>
				<dt>Provider</dt>
				<dd><?=htmlentities($gset->get_provider());?></dd>
				<dt>Hostname</dt>
				<dd><?=htmlentities($gset->get_hostname());?></dd>
				<dt>ID</dt>
				<dd><?=htmlentities($gset->get_id());?></dd>
				<dt>Username</dt>
				<dd><?=htmlentities($gset->get_username());?></dd>
				<dt>Password</dt>
				<dd><?=htmlentities(preg_replace('[.]', '*', $gset->get_password()));?></dd>
			</dl>
		</div>
	</div>
	<?}?>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">IP Ranges</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped datatable">
					<thead>
						<tr>
							<th>Name</th>
							<th>First IP</th>
							<th>Last IP</th>
							<th style="width: 225px;">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?
						foreach($ranges as $r) {
							$rem = "<a href=\"/grouprange/remove/".rawurlencode($g->get_group())."/".rawurlencode($r->get_name())."\"><button class=\"btn btn-sm btn-danger\">Remove</button></a>";
							print "<tr><td><a href=\"/network/range/view/".rawurlencode($r->get_name())."\">".htmlentities($r->get_name())."</a></td><td>".htmlentities($r->get_first_ip())."</td><td>".htmlentities($r->get_last_ip())."</td><td>$rem</td></tr>";
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Members</h3>
		</div>
		<div class="panel-body">
			<?if($gms instanceof Exception) {
				print $gms->getMessage();
			} else {?>
			<div class="table-responsive">
				<table class="table table-bordered table-striped datatable">
					<thead>
						<tr>
							<th>Username</th>
							<th>Group Privilege</th>
							<th style="width: 225px;">Actions</th>
						</tr>
					</thead>
					<tbody>
						<?
						foreach($gms as $gm) {
							$det = "<a href=\"/groupmember/view/".rawurlencode($gm->get_group())."/".rawurlencode($gm->get_user())."\"><button class=\"btn btn-sm btn-info\">Detail</button></a>";
							$mod= "<a href=\"/groupmember/modify/".rawurlencode($gm->get_group())."/".rawurlencode($gm->get_user())."\"><button class=\"btn btn-sm btn-warning\">Modify</button></a>";
							$rem = "<a href=\"/groupmember/remove/".rawurlencode($gm->get_group())."/".rawurlencode($gm->get_user())."\"><button class=\"btn btn-sm btn-danger\">Remove</button></a>";
							print "<tr><td><a href=\"/users/view/".rawurlencode($gm->get_user())."\">".htmlentities($gm->get_user())."</a></td><td>".htmlentities($gm->get_privilege())."</td><td>$det $mod $rem</tr>";
						}
						?>
					</tbody>
				</table>
			</div>
			<?}?>
		</div>
	</div>
</div>

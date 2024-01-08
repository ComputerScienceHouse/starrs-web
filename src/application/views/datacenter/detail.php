<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="/datacenter/view/<?=rawurlencode($dc->get_datacenter());?>"><h2><?=htmlentities($dc->get_datacenter());?></h2></a></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Date Created</dt>
				<dd><?=htmlentities($dc->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($dc->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($dc->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($dc->get_comment());?>&nbsp;</dd>
			</dl>
		</div>
	</div>
</div>

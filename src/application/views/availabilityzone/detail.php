<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?=htmlentities($az->get_zone());?></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Datacenter</dt>
				<dd><?=htmlentities($az->get_datacenter());?></dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($az->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($az->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($az->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($az->get_comment());?>&nbsp;</dd>
			</dl>
		</div>
	</div>
</div>

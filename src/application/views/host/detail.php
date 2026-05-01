<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><a href="/system/view/<?=rawurlencode($h->get_system_name())?>"><?=htmlentities($h->get_system_name());?></a></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>URI</dt>
				<dd><?=htmlentities($h->get_uri());?></dd>
				<dt>Password</dt>
				<dd><?=htmlentities($h->get_password());?></dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($h->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($h->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($h->get_last_modifier());?></dd>
			</dl>
		</div>
	</div>
</div>

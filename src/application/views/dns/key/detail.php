<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?=htmlentities($key->get_keyname());?></h3>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
				<dt>Key</dt>
				<dd><?=htmlentities($key->get_key());?></dd>
				<dt>Encryption</dt>
				<dd><?=htmlentities($key->get_enctype());?></dd>
				<dt>Owner</dt>
				<dd><?=htmlentities($key->get_owner());?></dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($key->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($key->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($key->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($key->get_comment());?>&nbsp;</dd>
			</dl>
		</div>
	</div>
</div>

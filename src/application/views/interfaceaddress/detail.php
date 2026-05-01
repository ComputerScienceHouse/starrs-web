<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<?if($intAddr->get_dynamic() == 'f') {?>
			<h3 class="panel-title"><?=htmlentities($intAddr->get_address());?> <img id="addr_state" title="Host is <?=($state==false)?"NOT ":""?>pingable from the STARRS server." src="/assets/img/<?=($state==true)?"up":"down";?>.png" /></h3>
			<?} else {?>
			<h3 class="panel-title">Dynamic</h3>
			<?}?>
		</div>
		<div class="panel-body">
			<dl class="dl-horizontal">
		        <dt>IP Range</dt>
		        <dd><?=($range)?"<a href=\"/network/range/view/".rawurlencode($range)."\">$range</a>":"None";?></dd>
				<dt>Primary</dt>
				<dd><?=($intAddr->get_isprimary()=='t')?"Yes":"No";?></dd>
				<dt>MAC</dt>
				<dd><?=htmlentities($intAddr->get_mac());?></dd>
				<dt>Config</dt>
				<dd><?=htmlentities($intAddr->get_config());?></dd>
				<dt>DHCP Class</dt>
				<dd><?=htmlentities($intAddr->get_class());?></dd>
				<dt>Date Created</dt>
				<dd><?=htmlentities($intAddr->get_date_created());?></dd>
				<dt>Date Modified</dt>
				<dd><?=htmlentities($intAddr->get_date_modified());?></dd>
				<dt>Last Modifier</dt>
				<dd><?=htmlentities($intAddr->get_last_modifier());?></dd>
				<dt>Comment</dt>
				<dd><?=htmlentities($intAddr->get_comment());?>&nbsp;</dd>
				<dt>Renew Date</dt>
				<dd><?=htmlentities($intAddr->get_renew_date());?></dd>
			</dl>
		</div>
	</div>
</div>

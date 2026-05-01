<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Modify SOA</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="modify-form">
				<div class="form-group">
					<label class="control-label">Nameserver</label>
					<input type="text" class="form-control" name="nameserver" value="<?=$soa->get_nameserver();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">TTL</label>
					<input type="text" class="form-control" name="ttl" value="<?=$soa->get_ttl();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Responsible Person</label>
					<input type="text" class="form-control" name="contact" value="<?=$soa->get_contact();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Serial</label>
					<input type="text" class="form-control" name="serial" value="<?=$soa->get_serial();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Refresh</label>
					<input type="text" class="form-control" name="refresh" value="<?=$soa->get_refresh();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Retry</label>
					<input type="text" class="form-control" name="retry" value="<?=$soa->get_retry();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Expire</label>
					<input type="text" class="form-control" name="expire" value="<?=$soa->get_expire();?>" />
				</div>
				<div class="form-group">
					<label class="control-label">Minimum</label>
					<input type="text" class="form-control" name="minimum" value="<?=$soa->get_minimum();?>" />
				</div>
				<div class="form-actions pull-right">
					<a href="/dns/soa/view/<?=rawurlencode($soa->get_zone());?>" class="btn btn-default">Cancel</a>
					<input type="submit" name="submit" value="Save" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

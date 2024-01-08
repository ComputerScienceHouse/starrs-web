<div class="col-md-9 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Search</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="search-form">
				<div class="form-group">
					<label class="control-label">Datacenter</label>
					<select name="datacenter" class="form-control">
						<option></option>
						<?php
						foreach($dcs as $dc) {
							print "<option>".htmlentities($dc->get_datacenter())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Availability Zone</label>
					<select name="availabilityzone" class="form-control">
						<option></option>
						<?php
						foreach($azs as $az) {
							print "<option value=\"{$az->get_zone()}\">".htmlentities($az->get_zone())." (".$az->get_datacenter().")</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Location</label>
					<input type="text" class="form-control" name="location" />
				</div>
				<div class="form-group">
					<label class="control-label">System Name</label>
					<input type="text" class="form-control" name="systemName" />
				</div>
				<div class="form-group">
					<label class="control-label">Asset</label>
					<input type="text" class="form-control" name="asset" />
				</div>
				<div class="form-group">
					<label class="control-label">Group</label>
					<select name="group" class="form-control">
						<option></option>
						<?php
						foreach($gs as $g) {
							print "<option>".htmlentities($g->get_group())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Platform</label>
					<select name="platform_name" class="form-control">
						<option></option>
						<?php
						foreach($platforms as $p) {
							print "<option>".htmlentities($p->get_platform_name())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">MAC Address</label>
					<input type="text" class="form-control" name="mac" />
				</div>
				<div class="form-group">
					<label class="control-label">Subnet</label>
					<select name="subnet" class="form-control">
						<option></option>
						<?php
						foreach($snets as $snet) {
							print "<option>".htmlentities($snet->get_subnet())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">IP Address</label>
					<input type="text" class="form-control" name="ipaddress" />
				</div>
				<div class="form-group">
					<label class="control-label">Config</label>
					<select name="config" class="form-control">
						<option></option>
						<?php
						foreach($configs as $c) {
							print "<option>".htmlentities($c->get_config())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Range</label>
					<select name="range" class="form-control">
						<option></option>
						<?php
						foreach($rs as $r) {
							print "<option>".htmlentities($r->get_name())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">DNS Hostname</label>
					<input type="text" class="form-control" name="hostname" />
				</div>
				<div class="form-group">
					<label class="control-label">DNS Zone</label>
					<select name="zone" class="form-control">
						<option></option>
						<?php
						foreach($zs as $z) {
							print "<option>".htmlentities($z->get_zone())."</option>";
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="control-label">Owner</label>
					<input type="text" class="form-control" name="owner" />
				</div>
				<div class="form-group">
					<label class="control-label">Last Modifier</label>
					<input type="text" class="form-control" name="lastmodifier" />
				</div>
				<div class="form-actions pull-right">
					<input type="submit" name="submit" value="Search" class="btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-md-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Fields</h3>
		</div>
		<div class="panel-body">
			<form method="POST" id="field-form">
				<p>Select the fields that you wish to have displayed in the search results.</p>
    			<div class="checkbox">
					<label>
	        			<input name="fields" type="checkbox" value="datacenter" checked> Datacenter 
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="availability_zone"> Availablity Zone 
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="system_name" checked> System Name
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
       	 				<input name="fields" type="checkbox" value="location"> Location 
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="asset"> Asset 
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="group"> Group 
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="platform"> Platform 
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="mac" checked> MAC 
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="system_owner" checked> System Owner
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="system_last_modifier"> System Last Modifier
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="range" checked> Range
	    			</label>
	    		</div>
    			<div class="checkbox">
    				<label>
    					<input name="fields" type="checkbox" value="hostname"> Hostname
    				</label>
    			</label>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="cname_alias"> CNAME
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="srv_alias"> SRV
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="zone"> DNS Zone
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="dns_owner"> DNS Owner
	    			</label>
	    		</div>
    			<div class="checkbox">
					<label>
        				<input name="fields" type="checkbox" value="dns_last_modifier"> DNS Last Modifier
	    			</label>
	    		</div>
    			<ul class="list-unstyled">
					<li><a id="f-all" href="#">Select all</a></li>
					<li><a id="f-none" href="#">Select none</a></li>
					<li><a id="f-def" href="#">Select default</a></li>
				</ul>
			</form>
		</div>
	</div>
</div>
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">STARRS</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="dropdown <?=($header=='Systems')?'active':null;?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-desktop"></i> Systems <span class="caret"></span></a>
					<ul class="dropdown-menu">
				   <?php if($u->get_view_mode() == "Advanced") {?>
						<li <?=($sub=='Datacenters')?'class="active"':null;?>><a href="/datacenters/">Datacenters</a></li>
						<li <?=($sub=='Availability Zones')?'class="active"':null;?>><a href="/availabilityzones/view">Availability Zones</a></li>
						<li <?=($sub=='Platforms')?'class="active"':null;?>><a href="/platforms/view/">Platforms</a></li>
						<li class="divider"></li>
					<?}?>
						<li <?=($sub=='Systems')?'class="active"':null;?>><a href="/systems/view/">My Systems (<?=$viewUser?>)</a></li>
						<li <?=($sub=='Renew')?'class="active"':null;?>><a href="/addresses/viewrenew/">Renewal</a></li>
						<li <?=($sub=='Quick Create')?'class="active"':null;?>><a href="/system/quickcreate/">Quick Create</a></li>
						<?php if($userLevel === "ADMIN") { ?>
						<li class="sm-show divider"></li>
						<li class="sm-show<?=($header=='Search')?' active':null;?>"><a href="/search">Search</a></li>
						<?php } ?>
					</ul>
				</li>
				<?php
				   if($u->get_view_mode() == "Advanced") {?>
				<li class="dropdown <?=($header=='DNS')?'active':null;?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cloud"></i> DNS <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li <?=($sub=='Records')?'class="active"':null;?>><a href="/dns/records">Records</a></li>
						<li <?=($sub=='Zones')?'class="active"':null;?>><a href="/dns/zones/">Zones</a></li>
						<li <?=($sub=='Keys')?'class="active"':null;?>><a href="/dns/keys/">Keys</a></li>
					</ul>
				</li>
				<li class="dropdown <?=($header=='DHCP')?'active':null;?>">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-feed"></i> DHCP <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li <?=($sub=='Classes')?'class="active"':null;?>><a href="/dhcp/classes/view">Classes</a></li>
						<li <?=($sub=='Global Options')?'class="active"':null;?>><a href="/dhcp/globaloptions/view">Global Options</a></li>
						<li <?=($sub=='dhcpd')?'class="active"':null;?>><a href="/dhcp/dhcpd/view">ISC-DHCPD Config</a></li>
					</ul>
				</li>
				<li class="dropdown <?=($header=='Network')?'active':null;?>" role="button" aria-haspopup="true" aria-expanded="false">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-exchange"></i> Network <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li <?=($sub=='Subnets')?'class="active"':null;?>><a href="/network/subnets/view">Subnets</a></li>
						<li <?=($sub=='Ranges')?'class="active"':null;?>><a href="/network/ranges/view">Ranges</a></li>
						<li <?=($sub=='VLANs')?'class="active"':null;?>><a href="/network/vlans/view">VLANs</a></li>
						<li class="divider"></li>
						<li <?=($sub=='SNMP')?'class="active"':null;?>><a href="/network/snmp/">SNMP</a></li>
						<li <?=($sub=='CAM')?'class="active"':null;?>><a href="/network/cam/">CAM Tables</a></li>
						<li <?=($sub=='Switchports')?'class="active"':null;?>><a href="/network/switchports/">Switchports</a></li>
					</ul>
				</li>
				<?}?>
				<?php if($userLevel === "ADMIN") { ?>
				<li class="dropdown <?=($header=='Admin')?'active':null;?>" role="button" aria-haspopup="true" aria-expanded="false">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i> Admin <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li <?=($sub=='Configuration')?'class="active"':null;?>><a href="/configuration/view">Configuration</a></li>
						<li <?=($sub=='Groups')?'class="active"':null;?>><a href="/groups/view/">Groups</a></li>
						<li <?=($sub=='Users')?'class="active"':null;?>><a href="/users/view/">Users</a></li>
					</ul>
				</li>
				<?php } ?>
				<li class="<?=($userLevel === "ADMIN")?'sm-hide':null;?> <?=($header=='Search')?"active":null;?>"><a href="/search"><i class="fa fa-search"></i> Search</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown navbar-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    	<?php 
                    		$impersonating = ($userName !== $viewUser);
                    		if($impersonating) {
                    			$userName = $viewUser;
                    			$displayName = $viewUser;
                    		}
                    	?>
                        <img src="https://profiles.csh.rit.edu/image/<?=htmlentities($userName);?>">
                        <span class="sm-hide"><?=htmlentities($displayName)?></span>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                    	<li><a href="#" id="uitoggle"><span class="glyphicon glyphicon-flash"></span> Advanced Mode</a></li>
                    	<?php 
                    		if(!$impersonating && isset($users)) {
                    			// Not impersonating another user and has permission to impersonate
                    	?>
                    	<li><a href="#" data-toggle="modal" data-target="#modal-impersonate"><i class="fa fa-user-secret" aria-hidden="true"></i> Impersonate User</a></li>
                    	<?php
                    		}
                    	?>
                        <li role="separator" class="divider"></li>
                        <li><a href="https://github.com/ComputerScienceHouse/starrs-web/issues" target="_blank"><span class="glyphicon glyphicon-exclamation-sign"></span> Report an Issue</a></li>
                        <?php 
                    		if($impersonating) {
                    			// Currently impersonating another user
                    	?>
                        <li><a href="#" id="stopImpersonating"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        <?php
                    		} else {
                    	?>
                    	<li><a href="https://webauth.csh.rit.edu/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                    	<?php
                    		}
                    	?>
                    </ul>
                </li>
			</ul>
		</div>
	</div>
</div>
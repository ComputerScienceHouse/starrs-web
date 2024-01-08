<div class="col-md-6 col-md-pull-3 col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">DNS</h3>
		</div>
		<div class="panel-body">
			<p>The Domain Name System allows convienient human-friendly names to be associated with IP addresses. Records are broken up into several parts: The zone (example.com) and the hostname (www). Together they form the record of www.example.com which will point to a specific host somewhere.</p>
			<h2>Zones</h2>
			<p>Zones (or domains) are areas of the DNS namespace that your records are assigned to. STARRS will manage your entire zone for you and handle all updates dynamically so you never need to directly edit the file.</p>
			<h2>Keys</h2>
			<p>In order to perform dynamic updates on a zone, a key is used to authenticate to the DNS server that will receive the update. Every zone that STARRS controls needs a key in order to function properly, otherwise no updates will be sent.</p>
			<h2>Addresses</h2>
			<p>DNS addresses are created on registered addresses. Click an address to view and modify it's respective DNS records.</p>
		</div>
	</div>
</div>

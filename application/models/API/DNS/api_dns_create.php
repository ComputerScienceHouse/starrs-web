<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . "libraries/core/ImpulseModel.php");

/**
 *	DNS
 */
class Api_dns_create extends ImpulseModel {
	
	public function key($keyname, $key, $owner, $comment) {
		// SQL Query
		$sql = "SELECT * FROM api.create_dns_key(
			{$this->db->escape($keyname)},
			{$this->db->escape($key)},
			{$this->db->escape($owner)},
			{$this->db->escape($comment)}
		)";
		$query = $this->db->query($sql);
		
		// Check error
		$this->_check_error($query);
		
		if($query->num_rows() > 1) {
			throw new APIException("The database returned more than one new key. Contact your system administrator");
		}
		
		// Return object
		return new DnsKey(
			$query->row()->keyname,
			$query->row()->key,
			$query->row()->owner,
			$query->row()->comment,
			$query->row()->date_created,
			$query->row()->date_modified,
			$query->row()->last_modifier
		);
	}
	
	public function zone($zone, $keyname, $forward, $shared, $owner, $comment, $ddns, $nameserver, $ttl, $contact, $serial, $refresh, $retry, $expire, $minimum) {
		// SQL Query
		$zonesql = "SELECT * FROM api.create_dns_zone(
			{$this->db->escape($zone)},
			{$this->db->escape($keyname)},
			{$this->db->escape($forward)},
			{$this->db->escape($shared)},
			{$this->db->escape($owner)},
			{$this->db->escape($comment)},
			{$this->db->escape($ddns)}
		)";
		$soasql = "SELECT * FROM api.create_dns_soa(
			{$this->db->escape($zone)},
			{$this->db->escape($ttl)},
			{$this->db->escape($nameserver)},
			{$this->db->escape($contact)},
			{$this->db->escape($serial)},
			{$this->db->escape($refresh)},
			{$this->db->escape($retry)},
			{$this->db->escape($expire)},
			{$this->db->escape($minimum)}
		)";
		$this->db->trans_off();
		$this->db->trans_start();
		$zonequery = $this->db->query($zonesql);
		$soaquery = $this->db->query($soasql);
		$this->db->trans_complete();

		// Check error
		$this->_check_error($zonequery);
		$this->_check_error($soaquery);
		
		// Return object
		$objects = array();
		$objects['zone'] = new DnsZone(
			$zonequery->row()->zone,
			$zonequery->row()->keyname,
			$zonequery->row()->forward,
			$zonequery->row()->shared,
			$zonequery->row()->owner,
			$zonequery->row()->comment,
			$zonequery->row()->ddns,
			$zonequery->row()->date_created,
			$zonequery->row()->date_modified,
			$zonequery->row()->last_modifier
		);

		$objects['soa'] = new SoaRecord(
			$soaquery->row()->zone,
			$soaquery->row()->nameserver,
			$soaquery->row()->ttl,
			$soaquery->row()->contact,
			$soaquery->row()->serial,
			$soaquery->row()->refresh,
			$soaquery->row()->retry,
			$soaquery->row()->expire,
			$soaquery->row()->minimum,
			$soaquery->row()->date_created,
			$soaquery->row()->date_modified,
			$soaquery->row()->last_modifier
		);

		return $objects;
	}

     public function address($address, $hostname, $zone, $ttl, $type, $reverse, $owner) {
		// SQL Query
		$sql = "SELECT * FROM api.create_dns_address(
			{$this->db->escape($address)},
			{$this->db->escape($hostname)},
			{$this->db->escape($zone)},
			{$this->db->escape($ttl)},
			{$this->db->escape($type)},
			{$this->db->escape($reverse)},
			{$this->db->escape($owner)}
		)";
		$query = $this->db->query($sql);

		// Check error
		$this->_check_error($query);
		
		// Return object
		return new AddressRecord(
			$query->row()->hostname,
			$query->row()->zone,
			$query->row()->address,
			$query->row()->type,
			$query->row()->ttl,
			$query->row()->owner,
			$query->row()->date_created,
			$query->row()->date_modified,
			$query->row()->last_modifier
		);
	}
	
	public function mx($hostname, $zone, $preference, $ttl, $owner) {
		// SQL Query
		$sql = "SELECT * FROM api.create_dns_mailserver(
			{$this->db->escape($hostname)},
			{$this->db->escape($zone)},
			{$this->db->escape($preference)},
			{$this->db->escape($ttl)},
			{$this->db->escape($owner)}
		)";
		$query = $this->db->query($sql);

		// Check error
		$this->_check_error($query);

        if($query->num_rows() > 1) {
			throw new APIException("The database returned more than one new record. Contact your system administrator");
		}

		// Return object
		return new MxRecord(
            $query->row()->hostname,
            $query->row()->zone,
            $query->row()->address,
            $query->row()->type,
            $query->row()->ttl,
            $query->row()->owner,
            $query->row()->preference,
            $query->row()->date_created,
            $query->row()->date_modified,
            $query->row()->last_modifier
        );
	}

    public function ns($zone, $nameserver, $address, $ttl) {
		// SQL Query
		$sql = "SELECT * FROM api.create_dns_ns(
			{$this->db->escape($zone)},
			{$this->db->escape($nameserver)},
			{$this->db->escape($address)},
			{$this->db->escape($ttl)}
		)";
		$query = $this->db->query($sql);

		// Check error
		$this->_check_error($query);
        
        if($query->num_rows() > 1) {
			throw new APIException("The database returned more than one new record. Contact your system administrator");
		}

		// Return object
		return new NsRecord(
            $query->row()->nameserver,
            $query->row()->zone,
            $query->row()->address,
            $query->row()->type,
            $query->row()->ttl,
            $query->row()->date_created,
            $query->row()->date_modified,
            $query->row()->last_modifier
        );
	}
	
	public function srv($alias, $hostname, $zone, $priority, $weight, $port, $ttl, $owner) {
		// SQL Query
		$sql = "SELECT * FROM api.create_dns_srv(
			{$this->db->escape($alias)},
			{$this->db->escape($hostname)},
			{$this->db->escape($zone)},
			{$this->db->escape($priority)},
			{$this->db->escape($weight)},
			{$this->db->escape($port)},
			{$this->db->escape($ttl)},
			{$this->db->escape($owner)}
		)";

		$query = $this->db->query($sql);

		// Check error
		$this->_check_error($query);

        if($query->num_rows() > 1) {
			throw new APIException("The database returned more than one new record. Contact your system administrator");
		}

		// Return object
		return new SrvRecord(
            $query->row()->alias,
            $query->row()->hostname,
            $query->row()->zone,
            $query->row()->address,
            $query->row()->type,
            $query->row()->ttl,
            $query->row()->owner,
            $query->row()->priority,
            $query->row()->weight,
            $query->row()->port,
            $query->row()->date_created,
            $query->row()->date_modified,
            $query->row()->last_modifier
        );
	}

	public function cname($alias, $hostname, $zone, $ttl, $owner) {
		// SQL Query
		$sql = "SELECT * FROM api.create_dns_cname(
			{$this->db->escape($alias)},
			{$this->db->escape($hostname)},
			{$this->db->escape($zone)},
			{$this->db->escape($ttl)},
			{$this->db->escape($owner)}
		)";
		$query = $this->db->query($sql);

		// Check error
		$this->_check_error($query);

		if($query->num_rows() > 1) {
			throw new APIException("The database returned more than one new record. Contact your system administrator");
		}

		// Return object
		return new CnameRecord(
            $query->row()->alias,
            $query->row()->hostname,
            $query->row()->zone,
            $query->row()->address,
            $query->row()->type,
            $query->row()->ttl,
            $query->row()->owner,
            $query->row()->date_created,
            $query->row()->date_modified,
            $query->row()->last_modifier
        );
	}

	public function txt($hostname, $zone, $text, $ttl, $owner) {
		// SQL Query
		$sql = "SELECT * FROM api.create_dns_txt(
			{$this->db->escape($hostname)},
			{$this->db->escape($zone)},
			{$this->db->escape($text)},
			{$this->db->escape($ttl)},
			{$this->db->escape($owner)}
		)";
		$query = $this->db->query($sql);

		// Check error
		$this->_check_error($query);

		if($query->num_rows() > 1) {
			throw new APIException("The database returned more than one new record. Contact your system administrator");
		}

		// Return object
		return new TextRecord(
            $query->row()->hostname,
            $query->row()->zone,
            $query->row()->address,
            $query->row()->type,
            $query->row()->ttl,
            $query->row()->owner,
            $query->row()->text,
            $query->row()->date_created,
            $query->row()->date_modified,
            $query->row()->last_modifier
        );
	}

	public function zonea($zone=null,$address=null,$ttl=null) {
		// SQL
		$sql = "SELECT * FROM api.create_dns_zone_a({$this->db->escape($zone)},{$this->db->escape($address)},{$this->db->escape($ttl)})";
		$query = $this->db->query($sql);

		// Check error
		$this->_check_error($query);

		// Return
		return new ZoneAddressRecord(
			$query->row()->hostname,
			$query->row()->zone,
			$query->row()->address,
			$query->row()->type,
			$query->row()->ttl,
			$query->row()->date_created,
			$query->row()->date_modified,
			$query->row()->last_modifier
		);
	}

	public function zonetxt($hostname=null,$zone=null,$text=null,$ttl=null) {
		// SQL
		$sql = "SELECT * FROM api.create_dns_zone_txt({$this->db->escape($hostname)},{$this->db->escape($zone)},{$this->db->escape($text)},{$this->db->escape($ttl)})";
		$query = $this->db->query($sql);

		// Check error
		$this->_check_error($query);

		// Return
		return new ZoneTextRecord(
			$query->row()->hostname,
			$query->row()->zone,
			$query->row()->address,
			$query->row()->type,
			$query->row()->ttl,
			$query->row()->text,
			$query->row()->date_created,
			$query->row()->date_modified,
			$query->row()->last_modifier
		);
	}
}
/* End of file api_dns_create.php */
/* Location: ./application/models/API/DNS/api_dns_create.php */

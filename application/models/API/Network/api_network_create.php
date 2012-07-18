<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	Management
 */
class Api_network_create extends ImpulseModel {
	
	public function snmp($system, $address, $ro, $rw) {
		$sql = "SELECT * FROM api.create_network_snmp(
			{$this->db->escape($system)},
			{$this->db->escape($address)},
			{$this->db->escape($ro)},
			{$this->db->escape($rw)}
		)";
		$query = $this->db->query($sql);

		$this->_check_error($query);

		return new SnmpCred(
			$query->row()->system_name,
			$query->row()->address,
			$query->row()->ro_community,
			$query->row()->rw_community,
			$query->row()->date_created,
			$query->row()->date_modified,
			$query->row()->last_modifier
		);
	}
}
/* End of file api_network_create.php */
/* Location: ./application/models/API/Network/api_network_create.php */

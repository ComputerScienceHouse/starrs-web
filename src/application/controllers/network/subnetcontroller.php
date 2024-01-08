<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . "libraries/core/ImpulseController.php");

class Subnetcontroller extends ImpulseController {

	public function __construct() {
		parent::__construct();
		$this->_setNavHeader("Network");
		$this->_setSubHeader("Subnets");
		$this->_addScript("/assets/js/ip.js");
		$this->_addTrail("Network","/network");
		$this->_addTrail("Subnets","/network/subnets/");
	}

	public function index() {
		$this->_sendClient("#");
	}

	public function view($subnet) {
		// Decode
		$subnet = rawurldecode($subnet);

		// Instantiate
		try {
			$snet = $this->api->ip->get->subnet($subnet);
			$stat = $this->api->ip->get->subnetStats($snet->get_subnet());
		}
		catch(Exception $e) { $this->_exit($e); return; }
	
		try {
			$snets = $this->api->ip->get->subnets($this->user->getActiveUser());
		}
		catch(ObjectNotFoundException $e) { $snets = array(); }
		catch(Exception $e) { $this->_exit($e); return; }

		// Trail
		$this->_addTrail($snet->get_subnet(),"/network/subnet/view/".rawurlencode($snet->get_subnet()));

		// Actions
		$this->_addAction("Create Range","/network/range/create/".rawurlencode($snet->get_subnet()),"success");
		$this->_addAction("Create DHCP Option","/dhcp/subnetoption/create/".rawurlencode($snet->get_subnet()),"success");
		$this->_addAction("Modify","/network/subnet/modify/".rawurlencode($snet->get_subnet()));
		$this->_addAction("Remove","/network/subnet/remove/".rawurlencode($snet->get_subnet()));

		// Options
		try {
			$opts = $this->api->dhcp->get->subnetoptions($snet->get_subnet());
		}
		catch(ObjectNotFoundException $e) { $opts = array(); }
		catch(Exception $e) { $this->_exit($e); return; }

		// Rangs
		try {
			$ranges = $this->api->ip->get->rangesBySubnet($snet->get_subnet());
		}
		catch(ObjectNotFoundException $e) { $ranges = array(); }
		catch(Exception $e) { $this->_exit($e); return; }

		// Viewdata
		$viewData['snet'] = $snet;
		$viewData['ranges'] = $ranges;
		$viewData['stat'] = $stat;

		// Content
		$content = "<div class=\"col-md-6 col-md-pull-3 col-sm-12\">";
		$content .= $this->load->view('network/subnet/detail',$viewData,true);
		$content .= $this->_renderOptionView($opts);
		$content .= "</div>";

		// Sidebar
		$this->_addSidebarHeader("SUBNETS (# IPs FREE)");
		foreach($snets as $sn) {
            $stat = $this->api->ip->get->subnetStats($sn->get_subnet());
			if($sn->get_subnet() == $snet->get_subnet()) {
				$this->_addSidebarItem($sn->get_subnet()." (".$stat->free.")","/network/subnet/view/".rawurlencode($sn->get_subnet()),"tags",1);
			} else {
				$this->_addSidebarItem($sn->get_subnet()." (".$stat->free.")","/network/subnet/view/".rawurlencode($sn->get_subnet()),"tags");
			}
		}

		// Render
		$this->_render($content);
	}

	public function create() {
		// Create
		if($this->input->post()) {
			try {
				$snet = $this->api->ip->create->subnet(
					$this->_post('subnet'),
					$this->_post('name'),
					$this->_post('comment'),
					$this->_post('autogen'),
					$this->_post('dhcp_enable'),
					$this->_post('zone'),
					$this->_post('owner'),
					$this->_post('datacenter'),
					$this->_post('vlan')
				);

				$this->_sendClient("/network/subnet/view/".rawurlencode($snet->get_subnet()));
			}
			catch(Exception $e) { $this->_error($e); return; }
		}

		$viewData['user'] = $this->user;
		try {
			$viewData['zones'] = $this->api->dns->get->zonesByUser($this->user->getActiveUser());
		}
		catch(ObjectNotFoundException $e) {
			$this->_exit(new Exception("No zones configured! Create at one or more DNS zones before attempting to create a subnet"));
			return;
		}
		catch(Exception $e) { $this->_error($e); return; }
		try {
			$viewData['dcs'] = $this->api->systems->get->datacenters();
		}
		catch(ObjectNotFoundException $e) { $this->_exit(new Exception("No datacenters found. Configure at least one datacenter before creating a subnet")); return; }
		catch(Exception $e) { $this->_exit($e); return; }
		try {
			$viewData['vlans'] = $this->api->network->get->vlans(null);
		}
		catch(ObjectNotFoundException $e) { $this->_exit(new Exception("No VLANs found. Configure at least one datacenter before creating a subnet")); return; }
		catch(Exception $e) { $this->_exit($e); return; }

		$content = $this->load->view('network/subnet/create',$viewData,true);
		$content .= $this->forminfo;
		
		// Render
		$this->_render($content);
	}

	public function modify($subnet) {
		// Decode
		$subnet = rawurldecode($subnet);

		// Instantiate
		try {
			$snet = $this->api->ip->get->subnet($subnet);
		}
		catch(Exception $e) { $this->_error($e); return; }

		// Modify
		if($this->input->post()) {
			$err = array();

			if($snet->get_subnet() != $this->_post('subnet')) {
				try { $snet->set_subnet($this->_post('subnet')); }
				catch(Exception $e) { $err[] = $e; }
			}
			if($snet->get_name() != $this->_post('name')) {
				try { $snet->set_name($this->_post('name')); }
				catch(Exception $e) { $err[] = $e; }
			}
			if($snet->get_zone() != $this->_post('zone')) {
				try { $snet->set_zone($this->_post('zone')); }
				catch(Exception $e) { $err[] = $e; }
			}
			if($snet->get_dhcp_enable() != $this->_post('dhcp_enable')) {
				try { $snet->set_dhcp_enable($this->_post('dhcp_enable')); }
				catch(Exception $e) { $err[] = $e; }
			}
			if($snet->get_autogen() != $this->_post('autogen')) {
				try { $snet->set_autogen($this->_post('autogen')); }
				catch(Exception $e) { $err[] = $e; }
			}
			if($snet->get_comment() != $this->_post('comment')) {
				try { $snet->set_comment($this->_post('comment')); }
				catch(Exception $e) { $err[] = $e; }
			}
			if($snet->get_owner() != $this->_post('owner')) {
				try { $snet->set_owner($this->_post('owner')); }
				catch(Exception $e) { $err[] = $e; }
			}
			if($snet->get_datacenter() != $this->_post('datacenter')) {
				try { $snet->set_datacenter($this->_post('datacenter')); }
				catch(Exception $e) { $err[] = $e; }
			}
			if($snet->get_vlan() != $this->_post('vlan')) {
				try { $snet->set_vlan($this->_post('vlan')); }
				catch(Exception $e) { $err[] = $e; }
			}


			if($err) {
				$this->_error($err);
				return;
			}
			$this->_sendClient("/network/subnet/view/".rawurlencode($snet->get_subnet()));
		}

		// Viewdata
		$viewData['snet'] = $snet;
		$viewData['isAdmin'] = $this->user->isAdmin();
		$viewData['zones'] = $this->api->dns->get->zonesByUser($this->user->getActiveUser());
		$viewData['dcs'] = $this->api->systems->get->datacenters();
		try {
			$viewData['vlans'] = $this->api->network->get->vlans($snet->get_datacenter());
		}
		catch(ObjectNotFoundException $e) { $viewData['vlans'] = array(); }
		catch(Exception $e) { $this->_exit($e); return; }

		// Content
		$content = $this->load->view('network/subnet/modify',$viewData,true);
		$content .= $this->forminfo;

		// Render
		$this->_render($content);
	}

	public function remove($subnet) {
		// Decode
		$subnet = rawurldecode($subnet);

		// Instantiate
		try {
			$snet = $this->api->ip->get->subnet($subnet);
		}
		catch(Exception $e) { $this->_error($e); return; }

		// Remove
		if($this->input->post('confirm')) {
			try {
				$this->api->ip->remove->subnet($snet->get_subnet());
				$this->_sendClient("/network/subnets/view");
			}
			catch(Exception $e) { $this->_error($e); return; }
		}
		else {
			$this->_error(new Exception("no confirmation"));
		}
	}
}

/* End of file subnetcontroller.php */
/* Location: ./application/controllers/subnetcontroller.php */

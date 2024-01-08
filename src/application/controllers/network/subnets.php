<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . "libraries/core/ImpulseController.php");

class Subnets extends ImpulseController {

	public function __construct() {
		parent::__construct();
		$this->_setNavHeader("Network");
		$this->_setSubHeader("Subnets");
		$this->_addTrail("Network","/network");
	}

	public function index() {
		$this->_sendClient("/network/subnets/view");
	}

	public function view() {

		// Instantiate
		try {
			$snets = $this->api->ip->get->subnets($this->user->getActiveUser());
		}
		catch(ObjectNotFoundException $e) { $snets = array(); }
		catch(Exception $e) { $this->_exit($e); return; }

		// Trail
		$this->_addTrail("Subnets","/network/subnets/view/");

		// Actions
		$this->_addAction("Create","/network/subnet/create");

		// Content
		$this->_addSidebarHeader("SUBNETS (# IPs Free)");
		foreach($snets as $snet) {
            $stat = $this->api->ip->get->subnetStats($snet->get_subnet());
			$this->_addSidebarItem($snet->get_subnet()." (".$stat->free.")","/network/subnet/view/".rawurlencode($snet->get_subnet()),"tags");
		}

		$content = $this->load->view('network/subnet/information',null,true);

		// Render
		$this->_render($content);
	}
}

/* End of file subnets.php */
/* Location: ./application/controllers/subnets.php */

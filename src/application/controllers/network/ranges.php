<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . "libraries/core/ImpulseController.php");

class Ranges extends ImpulseController {

	public function __construct() {
		parent::__construct();
		$this->_setNavHeader("Network");
		$this->_setSubHeader("Ranges");
		$this->_addTrail("Network","/network");
		$this->_addTrail("Ranges","/network/ranges");
	}

	public function index() {
		$this->_sendClient("/network/ranges/view/");
	}

	public function view() {

		// Sidebar
		try {
			$snets = $this->api->ip->get->subnets($this->user->getActiveUser());
		}
		catch(ObjectNotFoundException $e) { $snets= array(); }
		catch(Exception $e) { $this->_exit($e); return; }
		
		if (empty($snets)) {
			$this->_sidebarBlank();
		} else {
			foreach($snets as $snet) {
				$this->_addSidebarHeader($snet->get_subnet(),"/network/subnet/view/".rawurlencode($snet->get_subnet()));
				try {
					$ranges = $this->api->ip->get->rangesBySubnet($snet->get_subnet()); 
				}
				catch(ObjectNotFoundException $e) { $ranges = array(); }
				catch(Exception $e) { $this->_exit($e); return; }
		
				foreach($ranges as $r) {
					$this->_addSidebarItem($r->get_name(),"/network/range/view/".rawurlencode($r->get_name()),"resize-full");
				}
			}
		}
		
		// Content
		$this->_actionsBlank();
		$content = $this->load->view('network/range/information',null,true);

		// Render
		$this->_render($content);
	}
}

/* End of file ranges.php */
/* Location: ./application/controllers/ranges.php */

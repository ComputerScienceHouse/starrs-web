<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . "libraries/core/ImpulseController.php");

class Interfaces extends ImpulseController {

	public function __construct() {
		parent::__construct();
		$this->_setNavHeader("Systems");
		$this->_setSubHeader("Systems");
		$this->_addScript("/assets/js/systems.js");
	}

	public function view($systemName) {
		// Decode
		$systemName = rawurldecode($systemName);

		// Instantiate
		try {
			$sys = $this->api->systems->get->systemByName($systemName);
		}
		catch(Exception $e) { $this->_exit($e); return; }

		// Breadcrumb Trail
		$this->_addTrail('Systems',"/systems");
		$this->_addTrail($sys->get_system_name(),"/system/view/{$sys->get_system_name()}");
		$this->_addTrail("Interfaces","/interfaces/view/{$sys->get_system_name()}");

		// Actions
		$this->_addAction('Add Interface',"/interface/create/".rawurlencode($sys->get_system_name()),"success");

		// Content
		try {
			$ints = $this->api->systems->get->interfacesBySystem($sys->get_system_name());
			$content = "<div class=\"col-md-6 col-md-pull-3 col-sm-12\">";
			
			foreach($ints as $int) {
				$content .= $this->load->view('interface/overview', array("int"=>$int), true);
			}
			
			$content .= "</div>";
		}
		catch (ObjectNotFoundException $e) { $content = $this->load->view('exceptions/objectnotfound',null,true); }
		catch (Exception $e) { $this->_exit($e); return; }

		// Sidebar
		$this->_addSidebarHeader("INTERFACES","/interfaces/view/".rawurlencode($sys->get_system_name()));
		try {
			$ints = $this->api->systems->get->interfacesBySystem($systemName);
			foreach($ints as $int) {
				$this->_addSidebarItem($int->get_name()." (".$int->get_mac().")","/interface/view/".rawurlencode($int->get_mac()),"road");
				try {
					$intAddrs = array_merge($intAddrs, $this->api->systems->get->interfaceaddressesByMac($int->get_mac()));
				}
				catch (ObjectNotFoundException $e) {}
				catch (Exception $e) {
					$content = $this->loadview('exceptions/exception',array('exception'=>$e),true);
					$this->_render($content);
					return;
				}
			}
		}
		catch (ObjectNotFoundException $e) {}
		catch (Exception $e) {
			$content = $this->loadview('exceptions/exception',array('exception'=>$e),true);
			$this->_render($content);
			return;
		}
		$this->_addSidebarHeader("ADDRESSES");
		foreach($intAddrs as $intAddr) {
			$int = $this->api->systems->get->interfaceByMac($intAddr->get_mac());
			if($intAddr->get_dynamic() == 't') {
			$this->_addSidebarItem("Dynamic (".$int->get_name().")","/address/view/".rawurlencode($intAddr->get_address()),"globe");
			} else {
				$this->_addSidebarItem($intAddr->get_address()." (".$int->get_name().")","/address/view/".rawurlencode($intAddr->get_address()),"globe");
			}
			try {
				$recs = array_merge($recs, $this->api->dns->get->recordsByAddress($intAddr->get_address()));
			}
			catch (Exception $e) {
				$content = $this->loadview('exceptions/exception',array('exception'=>$e),true);
				$this->_render($content);
				return;
			}
		}

		$this->_addSidebarHeader("DNS RECORDS");
		$this->_addSidebarDnsRecords($recs);

		if($sys->get_type() == 'VM Host') {
			$this->_addSidebarHeader("DOMAINS","/libvirt/host/view/".rawurlencode($sys->get_system_name()));
			try {
				$doms = $this->api->libvirt->get->domainsByHost($sys->get_system_name());
			}
			catch(ObjectNotFoundException $e) { $doms = array(); }
			catch(Exception $e) { $this->_exit($e); return; }
			foreach($doms as $dom) {
				$this->_addSidebarItem($dom->get_system_name(), "/system/view/".rawurlencode($dom->get_system_name()), "hdd");
			}
		}

		// Render
		$this->_render($content);
	}

	public function randommac() {
		print $this->impulselib->generate_mac_address();
	}
}

/* End of file interfaces.php */
/* Location: ./application/controllers/interfaces.php */

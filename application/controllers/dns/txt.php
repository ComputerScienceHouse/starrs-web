<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once(APPPATH . "libraries/core/ImpulseController.php");

class Txt extends ImpulseController {

	public function __construct() {
		parent::__construct();
		$this->_setNavHeader("DNS");
	}

	public function test() {
		print "foo";
	} 

	public function view($zone,$hostname,$hash) {
		// Decode
		$zone = rawurldecode($zone);
		$hostname = rawurldecode($hostname);
		$hash = rawurldecode($hash);

		// Instantiate
		try {
			$tRec = $this->api->dns->get->txtByMd5($zone, $hostname, $hash);
		}
		catch (Exception $e) { $this->_error($e); return; }

		$this->load->view('dns/txt/detail',array('rec'=>$tRec));
	}

	public function create($address=null) {
		if($this->input->post()) {
			$ttl = $this->_postToNull('ttl');
			try {
				$tRec = $this->api->dns->create->txt(
					$this->input->post('hostname'),
					$this->input->post('zone'),
					$this->input->post('text'),
					$ttl,
					$this->input->post('owner'));
				$this->_sendClient("/dns/records/view/".rawurlencode($tRec->get_address()));
			}
			catch (Exception $e) { $this->_error($e); return; }
		}
		else {
			$address = rawurldecode($address);
			try {
				$aRecs = $this->api->dns->get->addressesByAddress($address);
				$zones = $this->api->dns->get->zonesByUser($this->user->getActiveUser());
			}
			catch (Exception $e) { $this->_error($e); return; }
			$content = $this->load->view('dns/txt/create',array('aRecs'=>$aRecs,'zones'=>$zones,'user'=>$this->user),true);

			$this->_renderSimple($content);
		}
	}

	public function modify($zone, $hostname, $hash) {
		// Decode
		$zone = rawurldecode($zone);
		$hostname = rawurldecode($hostname);
		$hash = rawurldecode($hash);

		if($this->input->post()) {
			try {
				$tRec = $this->api->dns->get->txtByMd5($zone, $hostname, $hash);
			}
			catch (Exception $e) { $this->_error($e); return; }

			$err = array();

			if($tRec->get_hostname() != $this->input->post('hostname')) {
				try { $tRec->set_hostname($this->input->post('hostname')); }
				catch (Exception $e) { $err[] = $e; }
			}
			if($tRec->get_zone() != $this->input->post('zone')) {
				try { $tRec->get_zone($this->input->post('zone')); }
				catch (Exception $e) { $err[] = $e; }
			}
			if($tRec->get_ttl() != $this->input->post('ttl')) {
				try { $tRec->set_ttl($this->input->post('ttl')); }
				catch (Exception $e) { $err[] = $e; }
			}
			if($tRec->get_owner() != $this->input->post('owner')) {
				try { $tRec->set_owner($this->input->post('owner')); }
				catch (Exception $e) { $err[] = $e; }
			}
			if($tRec->get_text() != $this->input->post('text')) {
				try { $tRec->set_text($this->input->post('text')); }
				catch (Exception $e) { $err[] = $e; }
			}

			if($err) {
				$this->_error($err);
				return;
			}

			$this->_sendClient("/dns/records/view/".rawurlencode($tRec->get_address()));
			return;
		}
		else {

		// Instantiate
		$intAddrs = array();
		try {
			$tRec = $this->api->dns->get->txtByMd5($zone, $hostname, $hash);
			$aRecs = $this->api->dns->get->addressesByAddress($tRec->get_address());
			$zones = $this->api->dns->get->zonesByUser($this->user->getActiveUser());
			$systems = $this->api->systems->get->systemsByOwner($this->user->getActiveUser());
			foreach($systems as $sys) {
				try {
					$intAddrs = array_merge($intAddrs, $this->api->systems->get->interfaceaddressesBySystem($sys->get_system_name()));
				}
				catch (ObjectNotFoundException $e) { continue; }
				catch (Exception $e) { $this->_error($e); return; }
			}
		}
		catch (Exception $e) { $this->_error($e); return; }

		// View Data
		$viewData['tRec'] = $tRec;
		$viewData['aRecs'] = $aRecs;
		$viewData['zones'] = $zones;
		$viewData['intAddrs'] = $intAddrs;
		$viewData['user'] = $this->user;

		// Content
		$content = $this->load->view('dns/txt/modify',$viewData,true);

		// Render
		$this->_renderSimple($content);
		}
	}

	public function remove($zone,$hostname,$hash) {
		// Decode
		$zone = rawurldecode($zone);
		$hostname = rawurldecode($hostname);
		$hash = rawurldecode($hash);

		if(!$this->input->post('confirm')) {
			$this->_error(new Exception("No confirmation!"));
			return;
		}

		try {
			$tRec = $this->api->dns->get->txtByMd5($zone, $hostname, $hash);
			$this->api->dns->remove->txt($zone, $hostname, $tRec->get_text());
			$this->_sendClient("/dns/records/view/".rawurlencode($tRec->get_address()));
		}
		catch (Exception $e) { $this->_error($e); }
	}
}
/* End of file txt.php */
/* Location: ./application/controllers/dns/txt.php */

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * The replacement STARRS controller class. All controllers should extend from this rather than the builtin
 */
class ImpulseController extends CI_Controller {

	protected static $user;
	private $trail;
	private $sidebarItems;

	private $actions;
	private $navheader;
	private $subnav;
	private $contentList;
	private $sidebarBlank;
	private $actionsBlank;

	protected $ifState;

	protected $forminfo;

	private $js = array();

	public function __construct() {
		parent::__construct();

		
		// Initialize the database connection
		try {
			$this->api->initialize($this->impulselib->get_username());
		}
		catch(ObjectNotFoundException $onfE) {
			$this->_error("Unable to find your username (".$this->impulselib->get_username().") Make sure the LDAP server is functioning properly.");
		}
		catch(Exception $e) {
			die("Cannot initialize. Contact your local system administrators");
		}
		
		// Instantiate the user
		$this->user = new User(
			$this->impulselib->get_username(),
			$this->impulselib->get_name(),
			$this->api->get->current_user_level(),
			$this->input->cookie('starrs_viewUser',TRUE)
		);

		// Base JS
		$this->_addScript('/assets/js/starrs.js');
		$this->_addScript('/assets/js/table.js');
		$this->_addScript('/assets/js/modal.js');

		// Switchport
		$this->ifState['up'] = "<span class=\"label label-success\">Up</span>";
		$this->ifState['down'] = "<span class=\"label label-default\">Down</span>";
		$this->ifState['disabled'] = "<span class=\"label label-danger\">Disabled</span>";

		// Forminfo
		$this->forminfo = $this->load->view('core/forminfo',null,true);

		// Table
		$this->_configureTable();
	}

	private function _configureTable() {
		$tmpl = array(
			'table_open' => '<div class="col-md-12"><div class="table-responsive"><table class="table table-bordered table-striped datatable">',
			'table_close' => '</table></div></div>'
		);

		$this->table->set_template($tmpl);
	}

	public function index() {
		header("Location: /systems/view/".$this->user->getActiveUser());
	}

	protected function _render($content=null) {
		
		// Page title
		$title = "STARRS";
		foreach($this->uri->segment_array() as $seg) {
			$title .= " - ".ucfirst(rawurldecode($seg));
		}
	
		// Basic information about the user should be displayed
		$userData['u'] = $this->user;
		$userData['userName'] = $this->user->get_user_name();
		$userData['displayName'] = $this->user->get_display_name();
		$userData['userLevel'] = $this->user->get_user_level();
		$userData['viewUser'] = $this->user->getActiveUser();
		$userData['header'] = $this->navheader;
		$userData['sub'] = $this->subnav;

		// If the user is an admin then they have the ability to impersonate users
		if($this->user->isadmin()) {
			try {
				$userData['users'] = $this->api->get->users();
			}
			catch(ObjectNotFoundException $e) { $userData['users'] = array($this->user->getActiveUser()); }
			catch(Exception $e) {
				$content = $this->load->view('exceptions/exception',array("exception"=>$e),true);
			}
		}

		// Load navbar view
		$navbar = $this->load->view('core/navbar',$userData,true);

		// Load breadcrumb trail view
		$breadcrumb = $this->load->view('core/breadcrumb',array('segments'=>$this->trail),true);

		// Sidebar
		if($this->sidebarBlank) {
			$sidebar = "<div class=\"col-md-3 col-md-pull-3 col-sm-12\"></div>";
		} else {
			$sidebar = $this->load->view('core/sidebarblank',array('sideContent'=>$this->sidebarItems),true);
		}

		// Actions
		$actions = "";
		if($this->actionsBlank) {
			// Fixes push/pull layout when there aren't any actions to display
			$actions = "<div class=\"col-md-3 col-md-push-9 col-sm-12\"></div>";
		} else if ($this->actions) {
			$data['actions'] = $this->actions;
			$actions = $this->load->view('core/actions', $data, true);
		}
		
		// Info
		$content .= $this->load->view('core/modalinfo',null,true);

		// Confirmation
		$content .= $this->load->view('core/modalconfirm',null,true);

		// Modify
		$content .= $this->load->view('core/modalmodify',null,true);

		// Create 
		$content .= $this->load->view('core/modalcreate',null,true);
		
		// Impersonate
		if($this->user->isadmin()) {
			$content .= $this->load->view('core/modalimpersonate', $userData, true);
		}

		# This used to be core/modalselect but symlinks are dumb
		$content .= $this->load->view('dns/modalcreate',null,true);
		
		$content .= $this->load->view('core/modalloading',null,true);

		// Error Handling (Put all other modals above this one)
		$content .= $this->load->view('core/modalerror',null,true);

		// JS
		$scripts = "";
		foreach($this->js as $js) {
			$scripts .= "<script src=\"$js\"></script>";
		}

		// Version
		$rev = exec('git rev-parse --short HEAD');
		if (file_exists('version.txt')) {
		    $version = read_file('version.txt');
		} elseif (!strpos($rev, 'fatal')) {
		    $version = $rev;
		} else {
			$version = false;
		}

        $maint = $this->api->get->site_configuration('MAINTAINER');
        if(!$maint) {
            $maint = "Computer Science House";
        }

        $maint_url = $this->api->get->site_configuration('MAINTAINER_URL');
        if(!$maint_url) {
            $maint_url = "https://github.com/ComputerScienceHouse/starrs-web/issues";
        }

        // Send the data to the browser		
		$finalOut = $this->load->view('core/main',array('title'=>$title,'navbar'=>$navbar,'breadcrumb'=>$breadcrumb,'sidebar'=>$sidebar,'content'=>$content,'actions'=>$actions,'scripts'=>$scripts,'version'=>$version,'maint_url'=>$maint_url,'maint'=>$maint),true);

		$this->output->set_output($finalOut);
		return $finalOut;
	}

	protected function _addAction($action,$link,$class=null) {
		if(!$class) {
			switch($action) {
				case "Create":
					$class="success";
					break;
				case "Modify":
					$class="warning";
					break;
				case "Remove":
					$class="danger";
					break;
				default:
					$class="info";
					break;
			}
		}

		$id = strtolower(str_replace(" ",null,$action));

		$this->actions[] = $this->load->view('core/actionbutton',array("action"=>$action,"link"=>$link,"class"=>$class,"id"=>$id),true);
	}

	protected function _addTrail($name,$link) {
		$this->trail[$name] = $link;
	}

	protected function _addSidebarItem($text, $link, $icon=null, $active=null) {
		if($active) {
			$pre = "<li class=\"active\">";
		} else {
			$pre = "<li>";
		}
		if($icon) {
			$this->sidebarItems .= "$pre<a href=\"$link\"><i class=\"glyphicon glyphicon-$icon\"></i> ".htmlentities($text)."</a></li>";
		}
		else {
			$this->sidebarItems .= "$pre<a href=\"$link\">".htmlentities($text)."</a></li>";
		}
	}

	protected function _addSidebarHeader($text,$link=null) {
		if($link) {
			$this->sidebarItems .= "<li class=\"nav-header\"><a href=\"$link\">".htmlentities($text)."</a></li>";
		}	
		else {
			$this->sidebarItems .= "<li class=\"nav-header\">".htmlentities($text)."</li>";
		}
	}

	protected function _setNavHeader($header) {
		$this->navheader = $header;
	}

	protected function _setSubHeader($sub) {
		$this->subnav= $sub;
	}

	protected function _sendClient($url,$return=null) {
		if(!$return) {
			print "<script>window.location.href = '$url';</script>";
		}
		else {
			return "<script>window.location.href = '$url';</script>";
		}
	}

	protected function _error($e) {
		$this->load->view('exceptions/modalerror',array('exception'=>$e));
	}

	protected function _addSidebarDnsRecords($recs) {
		foreach($recs as $rec) {
			switch(get_class($rec)) {
				case 'AddressRecord':
					$this->_addSidebarItem($rec->get_hostname().".".$rec->get_zone(),"/dns/records/view/".rawurlencode($rec->get_address())."#A/AAAA","font");
					break;
				case 'CnameRecord':
					$this->_addSidebarItem($rec->get_alias().".".$rec->get_zone(),"/dns/records/view/".rawurlencode($rec->get_address())."#CNAME","hand-right");
					break;
				case 'MxRecord':
					$this->_addSidebarItem($rec->get_hostname().".".$rec->get_zone(),"/dns/records/view/".rawurlencode($rec->get_address())."#MX","envelope");
					break;
				case 'SrvRecord':
					$this->_addSidebarItem($rec->get_alias().".".$rec->get_zone(),"/dns/records/view/".rawurlencode($rec->get_address())."#SRV","wrench");
					break;
				case 'TextRecord':
					$this->_addSidebarItem($rec->get_hostname().".".$rec->get_zone(),"/dns/records/view/".rawurlencode($rec->get_address())."#TXT","list-alt");
					break;
				case 'NsRecord':
					$this->_addSidebarItem($rec->get_nameserver(),"/dns/records/view/".rawurlencode($rec->get_address())."#NS","file");
					break;
				default:
					throw new Exception("WTF?");
					break;
			}
		}
	}

	protected function _exit($e, $standalone=false) {
		if ($standalone) {
			$content = $this->load->view('exceptions/exception',array("exception"=>$e, "span"=>"12"),true);
			$content = "<div class=\"row\">".$content."</div>";
		} else {
			$content = $this->load->view('exceptions/exception',array("exception"=>$e),true);
			$content = $this->_render($content);
		}
		
		die($content);
	}

	protected function _addScript($path) {
		$this->js[] = $path;
	}

	protected function _renderSimple($content) {
		// JS
		foreach($this->js as $js) {
			$content .= "<script src=\"$js\"></script>";
		}

		$this->output->set_output($content);
	}

	protected function _postToNull($var) {
        // Frakin 0s
        if($_POST[$var] == '0') {
            return "0";
        }
		if(!$this->input->post($var)) {
			return null;
		}
		elseif($this->input->post($var) == "") {
			return null;
		}
		else {
			return trim($this->input->post($var));
		}
	}

	protected function _post($var) {
		return $this->_postToNull($var);
	}

	protected function _renderOptionView($opts) {
		$html = "<div class=\"table-responsive\"><table class=\"table table-striped table-bordered datatable\">";
		$html .= "<thead><tr><th>Option</th><th>Value</th><th style=\"width: 220px\">Actions</th></tr></thead><tbody>";
		
		foreach($opts as $opt) {
			// Links
			switch(get_class($opt)) {
				case "SubnetOption":
					$detLink = "/dhcp/subnetoption/view/".rawurlencode($opt->get_subnet())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					$modLink = "/dhcp/subnetoption/modify/".rawurlencode($opt->get_subnet())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					$remLink = "/dhcp/subnetoption/remove/".rawurlencode($opt->get_subnet())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					break;
				case "RangeOption":
					$detLink = "/dhcp/rangeoption/view/".rawurlencode($opt->get_range())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					$modLink = "/dhcp/rangeoption/modify/".rawurlencode($opt->get_range())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					$remLink = "/dhcp/rangeoption/remove/".rawurlencode($opt->get_range())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					break;
				case "ClassOption":
					$detLink = "/dhcp/classoption/view/".rawurlencode($opt->get_class())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					$modLink = "/dhcp/classoption/modify/".rawurlencode($opt->get_class())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					$remLink = "/dhcp/classoption/remove/".rawurlencode($opt->get_class())."/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					break;
				case "GlobalOption":
					$detLink = "/dhcp/globaloption/view/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					$modLink = "/dhcp/globaloption/modify/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					$remLink = "/dhcp/globaloption/remove/".rawurlencode($opt->get_option())."/".rawurlencode(md5($opt->get_value()));
					break;
			}

			// Table
			$html .= "<tr><td>".htmlentities($opt->get_option())."</td><td>".htmlentities($opt->get_value())."</td><td>";
			$html .= "<a href=\"$detLink\"><button class=\"btn btn-sm btn-info\">Detail</button></a>";
			$html .= "<span> </span>";
			$html .= "<a href=\"$modLink\"><button class=\"btn btn-sm btn-warning\">Modify</button></a>";
			$html .= "<span> </span>";
			$html .= "<a href=\"$remLink\"><button class=\"btn btn-sm btn-danger\">Remove</button></a>";
			$html .= "</td></tr>";
		}

		$html .= "</tbody></table></div>";

		$view = $this->load->view('dhcp/dhcpoptions',array('table'=>$html),true);
		return $view;
	}

	protected function _renderException($e) {
		return "<div class=\"col-md-6 col-md-pull-3 col-sm-12\">".$this->load->view('exceptions/modalerror',array('exception'=>$e),true)."</div>";
	}

	protected function _sidebarBlank() {
		$this->sidebarBlank = true;
	}
	
	protected function _actionsBlank() {
		$this->actionsBlank = true;
	}

	protected function loadview($path, $data, $return) {
		$data['tooltips'] = $this->impulselib->get_tooltips();
		return $this->load->view($path, $data, $return);
	}

}
/* End of file ImpulseController.php */
/* Location: ./application/libraries/core/ImpulseController.php */

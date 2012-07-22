<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Switchport extends ImpulseObject {

	////////////////////////////////////////////////////////////////////////
	// MEMBER VARIABLES
	
	private $systemName;
	
	private $name;
	
	private $description;

	private $alias;

	private $index;

	private $adminState;
	
	private $operState;

	private $trunk;
	
	
	////////////////////////////////////////////////////////////////////////
	// CONSTRUCTOR
	
	public function __construct($systemName, $name, $description, $alias, $index, $adminState, $operState, $trunk, $dateCreated, $dateModified, $lastModifier) {
		parent::__construct($dateCreated, $dateModified, $lastModifier);

		$this->systemName = $systemName;
		$this->adminState = $adminState;
		$this->operState = $operState;
		$this->name = $name;
		$this->description = $description;
		$this->alias = $alias;
		$this->index = $index;
		$this->trunk = $trunk;
	}
	
	////////////////////////////////////////////////////////////////////////
	// GETTERS
	
	public function get_system_name() { return $this->systemName; }
	public function get_admin_state() { return $this->adminState; }
	public function get_oper_state()  { return $this->operState; }
	public function get_name()        { return $this->name; }
	public function get_description() { return $this->description; }
	public function get_alias()       { return $this->alias; }
	public function get_index()       { return $this->index; }
	public function get_trunk()       { return $this->trunk; }
	
	////////////////////////////////////////////////////////////////////////
	// SETTERS

	public function set_admin_state($new) {
		$this->CI->api->network->modify->switchport($this->systemName, $this->index, 'admin_state', $new);
		$this->adminState = $new;
	}

	public function set_oper_state($new) {
		$this->CI->api->network->modify->switchport($this->systemName, $this->index, 'oper_state', $new);
		$this->operState = $new;
	}
	
	public function set_alias($new) {
		$this->CI->api->network->modify->switchport($this->systemName, $this->index, 'alias', $new);
		$this->alias = $new;
	}

	public function set_trunk($new) {
		$this->CI->api->network->modify->switchport($this->systemName, $this->index, 'trunk', $new);
		$this->trunk = $new;
	}
	////////////////////////////////////////////////////////////////////////
	// PRIVATE METHODS
	
	////////////////////////////////////////////////////////////////////////
	// PUBLIC METHODS
}
/* End of file Switchport.php */
/* Location: ./application/libraries/objects/Switchport.php */

<?php
class Inventory_model extends CI_Model {

	function getManufacturer(){
		$query = $this->db->get('manufacturer');
			
		return $query->result_array();
	}
}

?>
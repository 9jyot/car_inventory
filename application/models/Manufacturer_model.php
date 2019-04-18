<?php
class Manufacturer_model extends CI_Model {

	public function addModel(Type $var = null)
	{
		# code...
		print_r($_REQUEST)
	}
	public function addManufacturer($data){

		//$this->db->get_where('manufacturer', $data);
		$this->db->insert('manufacturer', $data);

		$query = $this->db->affected_rows();

		return $query;
	}

	function isManufacturerExist($data){

		$query = $this->db->get_where('manufacturer', $data);

		return $query->num_rows();
	}
}

?>
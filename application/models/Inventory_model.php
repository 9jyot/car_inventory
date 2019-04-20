<?php
class Inventory_model extends CI_Model {

	

	public function addModel($data){

		//$this->db->get_where('manufacturer', $data);
		$this->db->insert('model', $data);

		$query = $this->db->affected_rows();

		return $query;
	}

	function isModelExist($reg_no){

		$query = $this->db->get_where('model', array('registration_no' => $reg_no));

		return $query->num_rows();
	}

	function getList(){

		$query = $query = $this->db->query("SELECT m.name as manufacturer_name,mo.name as model_name,count(mo.model_id) as count from manufacturer m inner join model mo on m.manufacturer_id=mo.manufacturer_id group by m.manufacturer_id");
			
		return $query->result_array();
	}
}

?>
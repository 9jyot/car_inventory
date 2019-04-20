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

		$query = $query = $this->db->query("SELECT m.manufacturer_id,m.name as manufacturer_name,mo.name as model_name,count(mo.model_id) as count from manufacturer m inner join model mo on m.manufacturer_id=mo.manufacturer_id group by m.manufacturer_id");
			
		return $query->result_array();
	}

	function getInventoryDetail($manufacturer_id){
		$query = $query = $this->db->query("SELECT mo.model_id,mo.name as model_name,mo.color,mo.manufacturing_year,mo.registration_no,mo.note,mo.image,m.name as manufacturer_name  from manufacturer m inner join model mo on m.manufacturer_id=mo.manufacturer_id where m.manufacturer_id = '".$manufacturer_id."' AND sold_status='onsell' ");
			
		return $query->result_array();
	}
}

?>
<?php 
class Togel_model extends CI_Model {  
	public function get_4d() {
		return $this->db->query('select * from togel_4d');
	}
	public function get_lengkap($country){
		return $this->db->get('hasil_lengkap_'.$country);
	}
} 
?>
<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Direktorat_model extends CI_Model
{	
	var $table = 'direktorat';

	function getDataByID($id) {
		$this->db->where('id', $id);
       	$query =  $this->db->get($this->table);
		return $query->row();
	}
	
	function getAll()
	{
		$this->db->Order_by('id','ASC');
		$query = $this->db->get($this->table);
		return $query;
	}

	function addData() {
		$data = array(
			'nama_dir' => $this->input->post('nama_dir')
        );
        $this->db->insert($this->table, $data);
	}

	function editData($id) {
		
        $data = array(
			'nama_dir' => $this->input->post('nama_dir')
        );
			
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }
	
	function deleteData($id){
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

}
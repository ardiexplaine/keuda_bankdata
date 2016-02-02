<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Bagian_model extends CI_Model
{	
	var $table = 'bagian';

	function getDataByID($id) {
		$this->db->where('id_bag', $id);
       	$query =  $this->db->get($this->table);
		return $query->row();
	}
	
	function getAll()
	{
		$query = $this->db->query('Select * from bagian join direktorat on bagian.id_dir = direktorat.id ORDER BY bagian.id_dir');
		return $query;
	}

	function addData() {
		$data = array(
			'id_dir' => $this->input->post('id_dir'),
			'nama_bagian' => $this->input->post('nama_bagian')
        );
        $this->db->insert($this->table, $data);
	}

	function editData($id) {
		
        $data = array(
        	'id_dir' => $this->input->post('id_dir'),
			'nama_bagian' => $this->input->post('nama_bagian')
        );
			
        $this->db->where('id_bag', $id);
        $this->db->update($this->table, $data);
    }
	
	function deleteData($id){
		$this->db->where('id_bag', $id);
		$this->db->delete($this->table);
	}

}
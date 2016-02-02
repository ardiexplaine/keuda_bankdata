<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Usrmgr_model extends CI_Model
{	
	var $table = 'users';
	var $perpage = '10';

	function getDataByID($id) {
		$this->db->where('id_session', $id);
       	$query =  $this->db->get($this->table);
		return $query->row();
	}
	
	public function getData($parm)
	{
		$query = 'Select users.id_session,users.id,users.nama_lengkap,users.status,users.username,direktorat.nama_dir,bagian.nama_bagian from users 
		join bagian on users.id_bag = bagian.id_bag 
		join direktorat on bagian.id_dir=direktorat.id 
		'.$parm.'
		ORDER BY users.id_bag ASC' ;		
		return $query;
	}

	function getAll() {
		$parm = '';
		$data = $this->db->query($this->getData($parm));
		return  $data;
	}

	function searchData($keyword) {
		$parm = "where nama_lengkap like '%".$keyword."%' OR username like '%".$keyword."%' ";
		$data = $this->db->query($this->getData($parm));
		return  $data;
	}

	function addData() {
		$data = array(
			'id_bag' => $this->input->post('id_bag'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password').$this->config->item("key_login")),
			'status' => $this->input->post('status'),
			'id_session' => md5($this->input->post('username').$this->input->post('password'))
        );
        $this->db->insert($this->table, $data);
	}

	function editData($id) {

		if($this->input->post('password')!='') {
		
	        $data = array(
				'id_bag' => $this->input->post('id_bag'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password').$this->config->item("key_login")),
				'status' => $this->input->post('status')
	        	);
	    }else{
	    	$data = array(
				'id_bag' => $this->input->post('id_bag'),
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'), 
				'status' => $this->input->post('status')
	        );
	    }
		
        $this->db->where('id_session', $id);
        $this->db->update($this->table, $data);
    }
	
	function deleteData($id){
		$this->db->where('id_session', $id);
		$this->db->delete($this->table);
	}

	function gantiPassword() {
	 	$data = array(
			'password' => md5($this->input->post('password').$this->config->item("key_login"))
    	);
		$this->db->where('id', $this->input->post('user_id'));
        $this->db->update($this->table, $data);
	}

}
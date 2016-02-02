<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 
class Login_model extends CI_Model
{	
	function __construct()
	{
		parent::__construct();
	}
	
	function cek_login($data)
	{
		$cek['username'] = $data['username'];
		$cek['password'] = md5($data['password'].$this->config->item("key_login"));
		$cek_login       = $this->db->get_where('users', $cek);
		
		if(count($cek_login->result())>0)
		{
			foreach($cek_login->result() as $row)
			{
				$sess_data['user_id'] 	   = $row->id;
				$sess_data['id_dir'] 	   = $this->db->get_where('bagian',array('id_bag'=>$row->id_bag))->row()->id_dir;
				$sess_data['direktorat']   = $this->db->get_where('direktorat',array('id'=>$sess_data['id_dir']))->row()->nama_dir;
				$sess_data['id_bag'] 	   = $row->id_bag;
				$sess_data['bagian'] 	   = $this->db->get_where('bagian',array('id_bag'=>$row->id_bag))->row()->nama_bagian;

				$sess_data['nama_lengkap'] = $row->nama_lengkap;
				$sess_data['username'] 	   = $row->username;
				$sess_data['status']	   = $row->status;
				if($row->status=='1') { $sess_data['level']='admin'; } else $sess_data['level']='user';
				$sess_data['login']        = TRUE;
				$this->session->set_userdata($sess_data);
				// Update Id Session
				$this->db->where('id', $row->id);
        		$this->db->update('users', array("id_session"=>session_id()));			
			}
			redirect('beranda');
		}
		else
		{
			$this->session->set_flashdata('message', $this->library->message('warning','Username dan password tidak benar!'));
			redirect("login");
		}
	}

}
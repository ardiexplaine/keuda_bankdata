<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Usrmgr_model');
		$this->load->helper('security');
	}

	public function index()
	{
		$this->gantipassword();
	}

	public function gantipassword() {

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('password_lama', 'Password Lama', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
			
			if($this->form_validation->run() == TRUE)
			{
				$cek['id'] 		 = $this->input->post('user_id');
				$cek['password'] = md5($this->input->post('password_lama').$this->config->item("key_login"));
				$cek_login       = $this->db->get_where('users', $cek);
				
				if(count($cek_login->result())>0)
				{
					$this->Usrmgr_model->gantiPassword(); // Update Password Baru
					$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
				}
				else
				{
					$this->session->set_flashdata('message', $this->library->message('info',' Password lama tidak benar'));
				}
	        }
	    }

		$data['content'] = 'usrmgr/form_gantipassword';
		$this->load->view('base_theme',$data);
	}

}

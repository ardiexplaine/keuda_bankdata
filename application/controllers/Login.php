<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model','',TRUE);
		$this->load->helper('security');
	}

	public function index()
	{
		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('username','Username','required|xss_clean');
			$this->form_validation->set_rules('password','Password','required|xss_clean');
			
			if($this->form_validation->run() == TRUE)
			{	
				$data['username']	=	$this->input->post("username");
				$data['password']	=	$this->input->post("password");
				
				$this->login_model->cek_login($data);
	        }
	    }
		
		$this->load->view('login');
	}

	function logout()
	{	
		$this->session->sess_destroy();
		redirect(base_url(),'refresh');
	}
}

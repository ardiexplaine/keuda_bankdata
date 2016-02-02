<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usrmgr extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->checkAdmin();
		$this->load->model('Usrmgr_model');
		$this->load->helper('security');
	}

	public function index()
	{
		$data['content'] = 'usrmgr/index';
		$data['action_search'] = 'usrmgr/search';

		$data['tampil'] = $this->Usrmgr_model->getAll();
		$data['form_search'] = $this->load->view('form_search',$data,TRUE);
		$this->load->view('base_theme',$data);
	}

	public function create() {

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
			
			if($this->form_validation->run() == TRUE)
			{	
				//print_r($_POST);
				$this->Usrmgr_model->addData();
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
	        }
	    }

		$data['content'] = 'usrmgr/form';
		$this->load->view('base_theme',$data);
	}

	public function edit($id) {

		$data['attr'] = $this->Usrmgr_model->getDataByID($id);

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_lengkap','Nama Lengkap','required');
			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|matches[passconf]');
			$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim');
			
			if($this->form_validation->run() == TRUE)
			{	
				$this->Usrmgr_model->editData($id);
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
				redirect('usrmgr','refresh');
	        }
	    }

		$data['content'] = 'usrmgr/form';
		$this->load->view('base_theme',$data);
	}

	public function delete($id) {

		$this->Usrmgr_model->deleteData($id);
		$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil dihapus!'));
		redirect('usrmgr','refresh');
	}

	public function search()
	{
		$keyword = $_GET['keyword'];
		$data['content'] = 'usrmgr/index';
		$data['action_search'] = site_url().'usrmgr/search';

		$data['tampil'] = $this->Usrmgr_model->searchData($keyword);
		$data['form_search'] = $this->load->view('form_search',$data,TRUE);
		$this->load->view('base_theme',$data);
	}
}

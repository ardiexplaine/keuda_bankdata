<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Direktorat extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->checkAdmin();
		$this->load->model('Direktorat_model');
	}

	public function index()
	{
		$data['tampil'] = $this->Direktorat_model->getAll();

		$data['content'] = 'direktorat/index';
		$this->load->view('base_theme',$data);
	}

	public function create() {

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_dir','Nama Direktorat','required');
			
			if($this->form_validation->run() == TRUE)
			{	
				$this->Direktorat_model->addData();
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
	        }
	    }

		$data['content'] = 'direktorat/form';
		$this->load->view('base_theme',$data);
	}

	public function edit($id) {

		$data['attr'] = $this->Direktorat_model->getDataByID($id);

		//print_r($data);

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_dir','Nama Direktorat','required');
			
			if($this->form_validation->run() == TRUE)
			{	
				$this->Direktorat_model->editData($id);
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
				redirect('direktorat','refresh');
	        }
	    }

		$data['content'] = 'direktorat/form';
		$this->load->view('base_theme',$data);
	}

	public function delete($id) {

		$this->Direktorat_model->deleteData($id);
		$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil dihapus!'));
		redirect('direktorat','refresh');
	}
}

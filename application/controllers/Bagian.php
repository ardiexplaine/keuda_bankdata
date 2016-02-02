<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->checkAdmin();
		$this->load->model('Bagian_model');
	}

	public function index()
	{
		$data['tampil'] = $this->Bagian_model->getAll();

		$data['content'] = 'bagian/index';
		$this->load->view('base_theme',$data);
	}

	public function create() {

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_bagian','Nama Direktorat','required');
			
			if($this->form_validation->run() == TRUE)
			{	
				$this->Bagian_model->addData();
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
	        }
	    }

		$data['content'] = 'bagian/form';
		$this->load->view('base_theme',$data);
	}

	public function edit($id) {

		$data['attr'] = $this->Bagian_model->getDataByID($id);

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_bagian','Nama Direktorat','required');
			
			if($this->form_validation->run() == TRUE)
			{	
				$this->Bagian_model->editData($id);
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
				redirect('bagian','refresh');
	        }
	    }

		$data['content'] = 'bagian/form';
		$this->load->view('base_theme',$data);
	}

	public function delete($id) {

		$this->Bagian_model->deleteData($id);
		$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil dihapus!'));
		redirect('bagian','refresh');
	}
}

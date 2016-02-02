<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ktgadm extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->checkAdmin();
		$this->load->model('Kategoridata_model');
	}

	public function index()
	{
		$data['tampil'] = $this->Kategoridata_model->getAllData();
		$data['content'] = 'kategoridata/indexadm';
		$data['action_search'] = site_url().'ktgadm/search';

		$this->load->view('base_theme',$data);
	}

	public function view($id)
	{
		$this->session_menu_aktif($id);
		$title = $this->Kategoridata_model->getStatus($id)->row();
		$data['title'] = $title->nama_dir;
		$data['sub_title'] = $title->nama_bagian;

		$data['tampil'] = $this->Kategoridata_model->getAll($id);
		$data['content'] = 'kategoridata/index';
		$data['action_search'] = site_url().'ktgadm/search';

		$this->load->view('base_theme',$data);
	}

	public function session_menu_aktif($id_url) {
		$this->session->set_userdata(array('bagian_id'=>$id_url));
	}

	public function search()
	{
		$keyword = $_GET['keyword'];
		$data['content'] = 'kategoridata/indexadm';
		$data['action_search'] = site_url().'ktgadm/search';

		$data['tampil'] = $this->Kategoridata_model->searchData($keyword);
		$this->load->view('base_theme',$data);
	}

	function create() {

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_kategoridata','Kategori Data','required');
			
			if($this->form_validation->run() == TRUE)
			{	
				$this->Kategoridata_model->addDataAdm();
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
	        }
	    }
	    
		$data['content'] = 'kategoridata/formadm';
		$this->load->view('base_theme',$data);
	}

	public function edit($id) {

		$data['attr'] = $this->Kategoridata_model->getDataByID($id);

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_kategoridata','Kategori Data','required');
			
			if($this->form_validation->run() == TRUE)
			{	
				$this->Kategoridata_model->editDataAdm($id);
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
				redirect('ktgadm','refresh');
	        }
	    }

		$data['content'] = 'kategoridata/formadm';
		$this->load->view('base_theme',$data);
	}

	public function delete($id) {

		$this->Kategoridata_model->deleteDataAdm($id);
		$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil dihapus!'));
		redirect('ktgadm','refresh');
	}

}

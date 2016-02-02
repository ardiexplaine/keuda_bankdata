<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->checkLogin();
		$this->load->model('Kategoridata_model');
		$this->load->library('Tanggal');
	}

	public function index()
	{
		$data['tampil'] = $this->Kategoridata_model->getAlljpg();
		$data['content'] = 'beranda';
		$this->load->view('base_theme',$data);
	}

	public function search()
	{
		//echo '<pre>'; print_r($data);
		$data['tampil'] = $this->Kategoridata_model->searchFile();
		$this->load->view('viewdata/details',$data);
		$this->load->view('viewdata/large',$data);
	}

	public function largeicon()
	{
		$data['tampil'] = $this->Kategoridata_model->getAlljpg();
		$this->load->view('viewdata/large',$data);
	}

	public function details()
	{
		$data['tampil'] = $this->Kategoridata_model->getAlljpg();
		$this->load->view('viewdata/details',$data);
	}
}

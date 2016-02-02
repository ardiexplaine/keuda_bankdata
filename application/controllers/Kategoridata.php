<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategoridata extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->auth->checkLogin();
		$this->load->model('Kategoridata_model');
		$this->load->library(array('tanggal','Replace'));
		$this->load->helper('download');
		$this->load->helper('tgl_indo');
	}

	public function index()
	{
		$id = $_SESSION['id_bag'];

		$data['tampil'] = $this->Kategoridata_model->getAll($id);
		$data['content'] = 'kategoridata/index';
		$data['action_search'] = site_url().'kategoridata/search';
		
		$this->load->view('base_theme',$data);
	}

	public function search()
	{
		$keyword = $_GET['keyword'];
		$data['content'] = 'kategoridata/index';
		$data['action_search'] = site_url().'kategoridata/search';

		$data['tampil'] = $this->Kategoridata_model->searchDataUser($keyword);
		$this->load->view('base_theme',$data);
	}

	function create() {

		if(isset($_POST['submit']))
		{
			$this->form_validation->set_rules('nama_kategoridata','Kategori Data','required');
			
			if($this->form_validation->run() == TRUE)
			{	
				$this->Kategoridata_model->addData();
				$this->session->set_flashdata('message', $this->library->message('success',' Data Berhasil disimpan'));
	        }
	    }
	    
		$data['content'] = 'kategoridata/form';
		$this->load->view('base_theme',$data);
	}

	function formfiles() {
		$data['content'] = 'kategoridata/form_sendfile';
		$this->load->view('base_theme',$data);
	}

	function sendfiles() {

		if(isset($_FILES['image']))
		{
			$data = array(
			'id_ktg' => $this->input->post('id_ktg'),
			'id_bag' => $_SESSION['id_bag'],
			'deo_id' => $_SESSION['username'],
			'deo_tg' => date('Y-m-d')
			);
	        $this->db->insert('masterdata', $data);
	        $id_file = $this->db->insert_id();



			$data=$_FILES['image'];
			$total = count($data['name']);
			$data2=array();
			for($i=0; $i<$total; $i++)
			{
				$data2[]=array(
					'name'=>$data['name'][$i],
					'type'=>$data['type'][$i],
					'tmp_name'=>$data['tmp_name'][$i],
					'error'=>$data['error'][$i],
					'size'=>$data['size'][$i],
					'tgl_data'=>$_POST['tgl_data'][$i],
					'deskripsi'=>$_POST['deskripsi'][$i],
				);
			}


			//echo'<pre>';print_r($data2);
			$replace = new Replace;
			$tgl_skrng = date('d-m-Y');
			$no=0;
			foreach($data2 as $row)
			{
				$config['file_name'] = $replace->NamaFile($row['deskripsi']).'-'.$tgl_skrng;
				$config['upload_path'] = './asset/fileupload';
				$config['allowed_types'] = 'png|jpg|xls|xlsx|ppt|pptx';
				$this->load->library('multi_upload');

				$this->multi_upload->initialize($config); 
				if($this->multi_upload->do_upload($data2[$no]))
				{
					$image_data = $this->multi_upload->data();
					
					//Proses input data
					$in['id_data']     = $id_file;
					$in['nama_file']   = $image_data['file_name'];
					$in['jenisfile']   = $image_data['file_ext'];
					$in['tgl_data']	   = $row['tgl_data'];
					$in['deskripsi']   = $row['deskripsi'];

					$this->db->insert("masterfile",$in);

				}
				$no++;
			}
		}
	   
	}

	public function viewfiles($id) {

		$t =  $this->db->get_where('kategoridata',array('id_ktg'=>$id))->row();
		$data['title'] =  $this->db->get_where('direktorat',array('id'=>$t->id_dir))->row()->nama_dir;
		$data['sub_title'] = $this->db->get_where('bagian',array('id_bag'=>$t->id_bag))->row()->nama_bagian;
		$data['pagetitle'] = $t->nama_kategoridata;

		$data['tampil'] = $this->Kategoridata_model->getAllfile($id);
		$data['content'] = 'kategoridata/indexfile';
		
		$this->load->view('base_theme',$data);
	}

	public function getfile($id_mf)
	{
		$get = $this->db->get_where('masterfile',array('id_mf' => $id_mf));
		if($get->num_rows()>0)
		{
			$row = $get->row();
			$data = file_get_contents("./asset/fileupload/".$row->nama_file);
			force_download($row->nama_file, $data);
		}
	}

	public function uploadfile($id_ktg,$id_mf) {

		$t =  $this->db->get_where('kategoridata',array('id_ktg'=>$id_ktg))->row();
		$data['title'] =  $this->db->get_where('direktorat',array('id'=>$t->id_dir))->row()->nama_dir;
		$data['sub_title'] = $this->db->get_where('bagian',array('id_bag'=>$t->id_bag))->row()->nama_bagian;
		$data['pagetitle'] = $t->nama_kategoridata;

		$data['tampil'] = $this->Kategoridata_model->getAllfile($id_ktg);
		$data['content'] = 'kategoridata/form_uploadjpg';
		
		$this->load->view('base_theme',$data);
	}

	function uploadfilejpg() {

		if(isset($_FILES['image']))
		{

			$data=$_FILES['image'];
			$total = count($data['name']);
			$data2=array();
			for($i=0; $i<$total; $i++)
			{
				$data2[]=array(
					'name'=>$data['name'][$i],
					'type'=>$data['type'][$i],
					'tmp_name'=>$data['tmp_name'][$i],
					'error'=>$data['error'][$i],
					'size'=>$data['size'][$i],
					'id_ktg'=>$_POST['id_ktg'],
					'id_mf'=>$_POST['id_mf'],
					'deskripsi'=>$_POST['deskripsi'][$i],
				);
			}


			//echo'<pre>';print_r($data2);
			$replace = new Replace;			
			$no=0;
			foreach($data2 as $row)
			{
				$acak = rand(1,9999999999);
				$config['file_name'] = $replace->NamaFile($row['deskripsi']).'-'.$acak;
				$config['upload_path'] = './asset/fileupload/img';
				$config['allowed_types'] = 'png|jpg';
				$this->load->library('multi_upload');

				$this->multi_upload->initialize($config); 
				if($this->multi_upload->do_upload($data2[$no]))
				{
					$image_data = $this->multi_upload->data();
					
					//Proses input data
					$in['id_ktg']      = $row['id_ktg'];
					$in['id_mf']   	   = $row['id_mf'];
					$in['nfile']	   = $image_data['file_name'];
					$in['jfile']   	   = $image_data['file_ext'];
					$in['deskripsi']   = $row['deskripsi'];
					$in['deo_id']      = $_SESSION['username'];
					$in['deo_tg']      = date('Y-m-d');

					$this->db->insert("pptx_jpg",$in);

				}
				$no++;
			}
		}
	   
	} 

	function listfilejpg(){

		$this->load->view('listjpg');
	}

	public function actinUpdateDeskJpg()
	{
		//echo '<pre>'; print_r($_POST);

		$count = count($_POST['deskripsi']);
		$data= array();
		for($i=1; $i<=$count; $i++)
		{
			$data = array(
			  	'id_img' => $_POST['id_img'][$i],
			  	'deskripsi' => $_POST['deskripsi'][$i]
			);
			$cari=array('id_img'=>$_POST['id_img'][$i]);
			$this->db->update('pptx_jpg',$data, $cari);  
		}
		//echo '<pre>';print_r($data);die();
		
	}

	function approvefile($id_mf) {
		$this->db->where('id_mf', $id_mf);
        $this->db->update('masterfile', array('status'=>2));
	}

	function deletedata($id_mf,$id_data) {

		$this->load->helper('file');
		$query = $this->db->get_where('masterfile', array('id_mf' => $id_mf));
		foreach ($query->result() as $row)
		{
		   unlink("./asset/fileupload/".$row->nama_file);
		}
		$this->db->delete('masterfile',array('id_mf'=>$id_mf));
		$this->db->delete('masterdata',array('id_data'=>$id_data));
	}	

	function deletefile($id) {

		$this->load->helper('file');
		$query = $this->db->get_where('pptx_jpg', array('id_img' => $id));
		foreach ($query->result() as $row)
		{
		   unlink("./asset/fileupload/img/".$row->nfile);
		}
		$this->db->delete('pptx_jpg',array('id_img'=>$id));
	}	

}

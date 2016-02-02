<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class Kategoridata_model extends CI_Model
{	
	var $table = 'kategoridata';

	function getStatus($id)
	{
		$query = $this->db->query('Select * from bagian join direktorat on bagian.id_dir = direktorat.id where bagian.id_bag='.$id.' ORDER BY bagian.id_dir');
		return $query;
	}

	function getDataByID($id) {
		$this->db->where('id_ktg', $id);
       	$query =  $this->db->get($this->table);
		return $query->row();
	}
	
	function getAll($id)
	{
		$this->db->where('id_bag',$id);
		$this->db->order_by('id_ktg','ASC');
		$query = $this->db->get($this->table);
		return $query;
	}

	function addData() {
		$data = array(
			'id_dir' => $_SESSION['id_dir'],
			'id_bag' => $_SESSION['id_bag'],
			'nama_kategoridata' => $this->input->post('nama_kategoridata'),
			'deo_id' => $_SESSION['username'],
			'deo_tg' => date('Y-m-d')
		);
        $this->db->insert($this->table, $data);
	}

	function searchDataUser($keyword) {
		$parm = "where kategoridata.id_bag='".$_SESSION['id_bag']."' and kategoridata.nama_kategoridata like '%".$keyword."%' ";
		$data = $this->db->query($this->getQuery($parm));
		return  $data;
	}


	//-------------------------------------- Function Model untuk Admin ------------------------------------------------//

	function getQuery($parm) {
		$query = 'Select kategoridata.*, bagian.nama_bagian from kategoridata 
			INNER JOIN bagian on kategoridata.id_bag=bagian.id_bag
			'.$parm.'
			ORDER BY kategoridata.id_dir,bagian.id_bag ASC';
		return $query;	
	}

	function getAllData() {
		$parm = '';
		$data = $this->db->query($this->getQuery($parm));
		return  $data;
	}

	function searchData($keyword) {
		$parm = "where nama_bagian like '%".$keyword."%' OR nama_kategoridata like '%".$keyword."%' ";
		$data = $this->db->query($this->getQuery($parm));
		return  $data;
	}

	function addDataAdm() {
		$data = array(
			'id_dir' => $this->db->get_where('bagian',array('id_bag'=>$this->input->post('id_bag')))->row()->id_dir,
			'id_bag' => $this->input->post('id_bag'),
			'nama_kategoridata' => $this->input->post('nama_kategoridata'),
			'deo_id' => $_SESSION['username'],
			'deo_tg' => date('Y-m-d')
		);
        $this->db->insert($this->table, $data);
	}

	function editDataAdm($id) {
		
        $data = array(
        	'id_dir' => $this->db->get_where('bagian',array('id_bag'=>$this->input->post('id_bag')))->row()->id_dir,
			'id_bag' => $this->input->post('id_bag'),
			'nama_kategoridata' => $this->input->post('nama_kategoridata'),
			'deo_id' => $_SESSION['username'],
			'deo_tg' => date('Y-m-d')
        );
			
        $this->db->where('id_ktg', $id);
        $this->db->update($this->table, $data);
    }
	
	function deleteDataAdm($id){
		$this->db->where('id_ktg', $id);
		$this->db->delete($this->table);
	}

	function getAllfile($id) {
		$query = 'Select * from masterfile a join masterdata b on a.id_data=b.id_data where b.id_ktg='.$id.' ORDER BY b.deo_tg,a.tgl_data ASC';
		return $this->db->query($query);
	}

	function fileDetails($id) {
		$query = 'Select * FROM bagian a join direktorat b on a.id_dir=b.id where id_bag='.$id.' ORDER BY id_bag';
		return $this->db->query($query);
	}

	function getAllJpg($parm='') {
		$query = 'Select a.*,b.nama_file,b.deskripsi desk,b.tgl_data,c.nama_kategoridata,d.nama_bagian,e.nama_dir from pptx_jpg a 
					join masterfile b on a.id_mf=b.id_mf
					join kategoridata c on a.id_ktg=c.id_ktg
					join bagian d on c.id_bag=d.id_bag
					join direktorat e on d.id_dir=e.id
					'.$parm.'
					';
		return $query;
	}

	function offsearch() {
		$parm = '';
		$data = $this->db->query($this->getAllJpg($parm));
		return  $data;
	}

	function searchFile() {
		$keyword = $this->input->post('keyword');
		$bagian = $this->input->post('bagian');
		if($bagian!='0') {
			$parm = "where a.deskripsi like '%".$keyword."%' AND d.id_bag='".$bagian."' ";
		}else {
			$parm = "where a.deskripsi like '%".$keyword."%' ";
		}
		$data = $this->db->query($this->getAlljpg($parm));
		return  $data;
	}

}
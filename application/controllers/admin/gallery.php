<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	var $folder 	= 'gallery/';
	var $section 	= 'Gallery';
	var $i  		= 'admin/';

	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk')!=TRUE){$url=base_url('user');redirect($url);};
		$this->load->model('Gallery_model');
	}

	public function index()
	{
			$data 	= array(
			'content' 	=> $this->folder.'view',
			'section' 	=> $this->section,
			'i'			=> $this->i,
			'title' 	=> 'Images',
		);

		$this->load->view('admin/admin', $data);
		
	}

	public function data_gallery(){
		$data = $this->Gallery_model->list_data('gallery')->result();
		echo json_encode($data);
	}

	public function post(){
		$gambar = $this->input->post('image');

			if($gambar==''){
				$hasil['pesan']='tolong di isi';
			}else{
				$hasil['pesan']='';

			$data = array(
				'id_gallery'	=>null,
				'name_picture'	=>$gambar,
				'size_picture'	=>$gambar,
				'date_upload'	=>$gambar,
				);
			$this->Gallery_model->tambah($data);
			$hasil['tampil']= $this->tampil_data();
			}

		echo json_encode($hasil);	
	}

	public function delete(){
		$id = $this->input->post('id');
		$where = array('id_gallery'=>$id);
		$data = $this->Gallery_model->deleteData($where);	
		echo json_encode($data);

	}





	// view baru
	function viewData(){ 
		echo $this->tampil_data();
	}

	function tampil_data(){ 
		$output = '';
		$no = 0;
		$data_barang = $this->Gallery_model->Tampil_gallery()->result_array();
		foreach ($data_barang as $barang) {
			$no++;
			$output .='
				<tr>
					<td>'.$barang['name_picture'].'</td>
					<td>'.$barang['size_picture'].'</td>
					<td>'.$barang['date_upload'].'</td>
					<td><button type="button" id="'.$barang['id_gallery'].'" class="hapus_barang btn btn-danger btn-xs">Hapus</button></td>
				</tr>
			';
		}
		
		return $output;
	}




	// Upload gambar

	public function upload(){
	$data = $this->Gallery_model->save();
	echo json_encode($data);
	}







}

/* End of file gallery.php */
/* Location: ./application/controllers/admin/gallery.php */
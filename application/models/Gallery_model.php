<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_model extends CI_Model {

	private $table = 'gallery';

	public $id_gallery;
	public $name_picture;
	public $size_picture;
	public $date_upload;




	public function list_data($table){
		
		return $this->db->get($table);
	}

	public function tambah($data){
		return $this->db->insert('gallery', $data);
	}

	public function deleteData($where){
		$this->db->delete('gallery', $where);
	}

	function Tampil_gallery()
    {
        $this->db->select('*');
        $this->db->from('gallery');
        $data=$this->db->get();
        return $data;

    }



    // Tambah 2.0
    public function save()
		{
			$nama = $this->upload();

			if ($nama!='') {
				$ukuran = ($_FILES['gambar']['size']) / (1000000);
				$this->id_gallery 	= null;
				$this->name_picture	= $this->upload();
				$this->size_picture	= $ukuran ;
				$this->date_upload	= date("Y-m-d");

				$this->db->insert($this->table, $this);
				$status = true;
			}else{
				$status = false;
			}
		return $status;

			
		}

	private function upload()
		{
			$config['upload_path'] 		= './assets/upload/gallery';
			$config['allowed_types'] 	= 'jpeg|jpg|png';
			$config['remove_space']		= true;
			$config['file_name']		= uniqid();
			$config['overwrite']		= true;
			$config['max_size']  		= '13032';

			


			$this->load->library('upload', $config);
			
			if ( $this->upload->do_upload('gambar')){
				return $this->upload->data('file_name');
			}
				return "";
		}

}

/* End of file Gallery_model.php */
/* Location: ./application/models/Gallery_model.php */
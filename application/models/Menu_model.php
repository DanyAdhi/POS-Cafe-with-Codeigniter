<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model {

	private $table = 'menu';

	public $id_menu;
	public $kode_menu;
	public $type;
	public $picture;
	public $name_menu;
	public $price;
	public $description;
	public $status;


		public function rule()
		{
			return [
				['field' 	=> 'kode_menu',
				 'label'	=> 'Kode Menu',
				 'rules'	=> 'required',
				 'errors'	=> array(
				 				'required' => '<b>%s</b> tidak boleh kosong!'
				 				)],

				['field' 	=> 'nama_menu',
				 'label'	=> 'Nama Menu',
				 'rules'	=> 'required',
				 'errors'	=> array(
				 				'required' => '<b>%s<b/> tidak boleh kosong!'
				 				)],

				['field' 	=> 'harga',
				 'label'	=> 'Harga',
				 'rules'	=> 'required',
				 'errors'	=> array(
				 				'required' => '<b>%s</b> tidak boleh kosong!'
				 				)], 

				['field' 	=> 'deskripsi',
				 'label'	=> 'Deskripsi',
				 'rules'	=> 'required',
				 'errors' 	=> array(
				 				'required' => '<b>%s</b> tidak boleh kosong!'
				 				)],
			];
		}


		public function get_all_data()
		{
			return $this->db->get($this->table)->result();
		}

		public function get_data_tersedia()
		{
			return $this->db->get_where($this->table, array('status'=> '1'))->result();
		}

		public function get_data_by_id($where)
		{
			return $this->db->get_where($this->table, array('kode_menu'=> $where))->result();
		}

		public function DataById($where)
		{
			return $this->db->get_where($this->table, array('kode_menu'=> $where))->row();
		}

		public function newGetData($where)
		{
			$hsl=$this->db->query("SELECT * FROM menu where kode_menu='$where'");
			return $hsl;
		}

		public function getByType($where)
		{
			return $this->db->get_where($this->table, array('type'=>$where, 'status'=>'1'));
		}

		public function delete($pk)
		{
			$this->db->delete($this->table, array('kode_menu' => $pk));
		}

		public function save()
		{

			$post = $this->input->post();
			$this->id_menu      = null;
			$this->kode_menu 	= $post['kode_menu'];
			$this->type 		= $post['jenis'];
			$this->picture 		= $this->upload();
			$this->name_menu	= $post['nama_menu'];
			$this->price 		= $post['harga'];
			$this->description	= $post['deskripsi'];
			$this->status 		= 1;

			$this->db->insert($this->table, $this);
		}

		public function update()
		{
			$post = $this->input->post();
			$this->id_menu	 	= $post['id_menu'];
			$this->kode_menu 	= $post['kode_menu'];
			$this->type 		= $post['jenis'];

			if(!empty($_FILES['image']['name'])){
				$this->picture 	= $this->upload();
			} else {
				$this->picture 	= $post['OldImage'];
			}

			$this->name_menu	= $post['nama_menu'];
			$this->price 		= $post['harga'];
			$this->description	= $post['deskripsi'];
			$this->status 		= $post['status'];

			$this->db->update($this->table, $this, array('kode_menu'=>$post['kode_menu']));
		}

		

		

		private function upload()
		{
			
			$config['upload_path'] 		= './assets/upload';
			$config['allowed_types'] 	= 'jpeg|jpg|png';
			$config['file_name']		= $this->kode_menu;
			$config['overwrite']		= true;
			$config['max_size']  		= '13032';
			
			$this->load->library('upload', $config);
			
			if ( $this->upload->do_upload('image')){
				return $this->upload->data('file_name');
			}
				return "default.jpg";
		}



		public function object($id_menu, $kode_menu, $type, $picture, $name_menu, $price, $description, $status)
		{
			$data = array(
				'id_menu'		=> $id_menu,
				'kode_menu'		=> $kode_menu,
				'type'			=> $type,
				'picture'		=> $picture,
				'name_menu'		=> $name_menu,
				'price'			=> $price,
				'description'	=> $description,
				'status' 		=> $status

			);
			return $data;
		}



}

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */
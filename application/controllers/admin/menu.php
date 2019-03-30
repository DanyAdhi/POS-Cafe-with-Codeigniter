<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	var $folder 	= 'menu/';
	var $section 	= 'Food & Drink';
	var $i  		= 'admin/';

	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk')!=TRUE){$url=base_url('user');redirect($url);};
		$this->load->helper(array('form', 'url'));
		$this->load->model('Menu_model');
		$this->load->library('form_validation');
	}


	public function index()
	{
		$data 	= array(
			'content' 	=> $this->folder.'view',
			'section' 	=> $this->section,
			'i'			=> $this->i,
			'title' 	=> 'Overview',
			'tampil' 	=> $this->Menu_model->get_all_data()
		);

		$this->load->view('admin/admin', $data);
	}

	public function input()
	{
		$model 			= $this->Menu_model;

		$data=array(
			'content' 	=> $this->folder.'input',
			'section'	=> $this->section,
			'i'			=> $this->i,
			'title'		=> 'Inpu Data',
			'object'	=> $model->object(null, null, null, null, null, null, null,null),
			'merah'		=>''
		);

		


		$this->load->view('admin/admin', $data);
	}

	public function input_save()
	{
		$model 				= $this->Menu_model;
		$post 				= $this->input->post();
		$kode_menu 			= $post['kode_menu'];
		$where				= $kode_menu;
		$berapa 			= $model->get_data_by_id($where);
		$jum				= count($berapa);

		if($jum<1){
			$validation 	= $this->form_validation;
			$validation->set_rules($model->rule());
			 if($validation->run() == TRUE){
					$model->save();
					$this->session->set_flashdata('flash', 'input');
					$data['onject'] 	= $model->object(null, null, null, null, null, null, null,null);
					$data['merah']		= '';
					$back 				= $this->i.'menu/input';
					redirect($back,'refresh');
				}else {
				$data=array(
					'content' 	=> $this->folder.'input',
					'section'	=> $this->section,
					'i'			=> $this->i,
					'title'		=> 'Inpu Data',
				);
				$kode_menu 			= $post['kode_menu'];	
				$jenis 				= $post['jenis'];	
				$nama_menu			= $post['nama_menu'];	
				$harga 				= $post['harga'];	
				$deskripsi			= $post['deskripsi'];	
				$data['object'] 	= $model->object(null,$kode_menu, $jenis, null, $nama_menu, $harga, $deskripsi, null);
				$data['merah']		= '';
				$this->session->set_flashdata('flash', 'empty');
				$this->load->view('admin/admin', $data);
			}
		}else{		
			$this->session->set_flashdata('flash', 'duplicate');
			$data=array(
				'content' 	=> $this->folder.'input',
				'section'	=> $this->section,
				'i'			=> $this->i,
				'title'		=> 'Inpu Data',
			);

			$kode_menu 			= $post['kode_menu'];	
			$nama_menu			= $post['nama_menu'];	
			$jenis 				= $post['jenis'];	
			$harga 				= $post['harga'];	
			$deskripsi			= $post['deskripsi'];	
			$data['object'] 	= $model->object(null,$kode_menu, $jenis, null, $nama_menu, $harga, $deskripsi,null);
			$data['merah']		= 'merah';
			$this->load->view('admin/admin', $data);
		}
	}


	public function delete($id=null){
		if(!isset($id)) show_404();
		 $h 	= $this->i.'menu';

		$this->Menu_model->delete($id);
		$this->session->set_flashdata('flash', 'delete');

		redirect($h);
	}

	public function edit($id){
		if(!isset($id)) redirect($this->i.'menu');

		$model 			= $this->Menu_model;
		$d 				= $model->DataById($id);
		$data=array(
			'content' 	=> $this->folder.'edit',
			'section'	=> $this->section,
			'i'			=> $this->i,
			'title'		=> 'Edit Data',
			'object'	=> $model->object($d->id_menu, $d->kode_menu, $d->type, $d->picture, $d->name_menu, $d->price, $d->description, $d->status),
			'id'		=> $d->kode_menu,
			'merah'		=>''
		);
		$this->load->view('admin/admin', $data);
	}

	public function edit_save(){

		$model 				= $this->Menu_model;
		$post 				= $this->input->post();
		$oldId				= $this->uri->segment(4);
		$id 				= $post['kode_menu'];
		$validation 		= $this->form_validation;

		// JIKA ID TIDAK BERUBAH
		if($id==$oldId){ 
			$validation->set_rules($model->rule());
			if($validation->run()){
				$model->update($id);
				$this->session->set_flashdata('flash', 'update');
				redirect($this->i.'menu');
			}else{
				$data=array(
				'content' 	=> $this->folder.'edit',
				'section'	=> $this->section,
				'i'			=> $this->i,
				'title'		=> 'Edit Data',
				'object'	=> $model->object($post['id_menu'], $post['kode_menu'], $post['jenis'],$post['OldImage'], $post['nama_menu'], $post['harga'], $post['deskripsi'], $post['status']),
				'id'		=> $oldId,
				'merah'		=>''
				);
				$this->session->set_flashdata('flash','fail');
				$this->load->view('admin/admin',$data);
			}

		}else{
			// JIKA ID BERUBAH, CARI ID AD YANG SAMA APA NGGAK
			$berapa 			= $model->get_data_by_id($id);
			$jum				= count($berapa);
			if($jum>0){
				$data=array(
				'content' 	=> $this->folder.'edit',
				'section'	=> $this->section,
				'i'			=> $this->i,
				'title'		=> 'Edit Data',
				'object'	=> $model->object($post['kode_menu'],$post['jenis'],$post['nama_menu'],$post['harga'],$post['deskripsi']),
				'id'		=> $oldId,
				'merah'		=> 'merah'
				);
				$this->session->set_flashdata('flash','duplicate');
				$this->load->view('admin/admin',$data);
			}else{
				$model->update($id);
				$this->session->set_flashdata('flash', 'update');
				redirect($this->i.'menu');
			}
		}

	}


	public function updateStatus()
	{
		$id 	= $this->uri->segment(4);

		$cek = $this->db->get_where('menu', array('kode_menu'=> $id))->result_array();
		$cek = $cek[0]['status'];
		$data = array(
			''
		);
							  
		if($cek == '0')
		{
			$this->db->query("UPDATE menu SET status = '1' WHERE kode_menu = '$id' ");
			redirect($this->i.'menu');
		}
		else
		{
			$this->db->query("UPDATE menu SET status = '0' WHERE kode_menu = '$id' ");
			redirect($this->i.'menu');
		}
	}


	
}

/* End of file view.php */
/* Location: ./application/controllers/menu/view.php */
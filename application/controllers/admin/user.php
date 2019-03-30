<?php 
defined('BASEPATH') OR exit ('No direct script access allowed');

class User extends CI_Controller{

	var $folder 	= 'user_management/';
	var $table 		= 'user';
	var $i 			= 'admin/';
	var $section 	= 'User';


	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('masuk')!=TRUE){$url=base_url('user');redirect($url);};
		$this->load->library(array('form_validation'));
		$this->load->model('User_model', 'model');
	}

	public function index()
	{
		$data = [ 	
					'content'	=> $this->folder.'view',
				  	'section' 	=> $this->section,
				 	'i'			=> $this->i,
				 	'title'		=> 'Overview',
				 	'tampil'	=> $this->model->get_all()->result()
				 ];
		$this->load->view('admin/admin', $data);

	}

	public function add()
	{
		$data = array(
			'content' 	=> $this->folder.'register',
			'section'	=> $this->section,
			'i'			=> $this->i,
			'title'		=> 'Add User',
			'merah'		=> ''
		);
		$this->load->view('admin/admin', $data);
	}


	public function add_save()
	{
		$validasi= $this->form_validation->set_rules($this->model->rule());
		if($validasi->run() == false)
		{
			$data = array(
			'content' 	=> 'login/register',
			'section'	=> $this->section,
			'i'			=> $this->i,
			'title'		=> 'Add User',
			'merah'		=> ''
			);
			$this->load->view('admin/admin', $data);
		}
		else
		{
			$post = $this->input->post();
			$data = [
				'nama' 		=> $post['nama'],
				'username'	=> $post['username'],
				'password'	=> password_hash($post['password1'], PASSWORD_DEFAULT),
				'level'		=> $post['level']
			];
			$this->model->save($data);
			$this->session->set_flashdata('flash', 'add_user');
			redirect($i.'admin/user');
		}
	}

	public function delete($id=null)
	{
		if(!isset($id)) show_404();
		$this->model->delete($id);
		$this->session->set_flashdata('flash', 'delete');
		redirect('admin/user');
	}

	public function reset($id=null)
	{
		if(!isset($id)) show_404();
		$this->model->reset($id);
		$this->session->set_flashdata('flash', 'reset');
		redirect('admin/user');
	}




}


 ?>
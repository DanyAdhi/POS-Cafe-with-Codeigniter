<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


Class Login extends CI_Controller{


	var $table 		= 'user';
	var $section 	= 'Login';
	var $i 			= 'admin/';

	function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array(
			'content'  	=> 'login/login',
			'section' 	=> $this->section
		);
		$this->load->view('login/temp', $data);
	}

	public function auth()
	{

		$validation = $this->form_validation->set_rules($this->model->rule_login());
		if($validation->run()==false)
		{
			$data = array(
			'content'  	=> 'login/login',
			'section' 	=> $this->section
			);

			$this->load->view('login/temp', $data);
		}else{
			$post 	= $this->input->post();
			$user	= $post['username'];
			$pass	= $post['password'];
			$cek	= $this->model->get_by($user)->row_array();
			if($cek){
				if(password_verify($pass,$cek['password'])){
					$data = [
							'masuk'		=>true,
							'username'	=>$cek['username'],
							'nama'		=>$cek['nama'],
							'level'		=>$cek['level']
							];
					$this->session->set_userdata($data);
					redirect('admin/dashboard');
				}else{
					$data = array(
					'content'  	=> 'login/login',
					'section' 	=> $this->section
					);
					$this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
						  <b>password</b> anda salah.
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>');
					$this->load->view('login/temp', $data);
				}
			}else{
				$data = array(
				'content'  	=> 'login/login',
				'section' 	=> $this->section
				);
				$this->session->set_flashdata('flash', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <b>Username!</b> belum terdaftar.
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>');
				$this->load->view('login/temp', $data);
			}
		}
	}


	public function logout()
	{
		session_destroy();
		redirect($this->i.'login');
	}

}



 ?>
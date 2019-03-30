<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	var $section = 'Dashboard';
	var $i 		 = 'admin/';

	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url('/user');
            redirect($url); };
            
		$this->load->model('Menu_model');
	}

	public function index()
	{

		$model 	= $this->Menu_model;
		$data = array(
			'content'	=> 'admin/Dashboard',
			'section' 	=> $this->section,
			'i'			=> $this->i,
			'title' 	=> 'Dashboard',
			'food'		=> count($model->getByType('makanan')->result()),
			'drink'		=> count($model->getByType('minuman')->result()),
			'all'		=> count($model->get_all_data()),
			);
		$this->load->view('admin/admin', $data);
	}

}

/* End of file index.php */
/* Location: ./application/controllers/admin/index.php */
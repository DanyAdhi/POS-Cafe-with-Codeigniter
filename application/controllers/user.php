<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	var $folder="user/";

	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('Gallery_model');
		$this->load->model('Menu_model');
	}


	public function index()
	{
		$data 	= [ 'content' => $this->folder.'home'];
		$this->load->view('user/template', $data);
	}

	public function menu()
	{
		$data 	= array(
					'content' => $this->folder.'menu',
					'tampilAll' => $this->Menu_model->get_data_tersedia(),
					'tampilFood' => $this->Menu_model->getByType('makanan')->result(),
					'tampilDrink' => $this->Menu_model->getByType('minuman')->result(),
						);
		$this->load->view('user/template', $data);
	}

	public function gallery()
	{
		$data 	= array(
					'content' => $this->folder.'gallery',
					'tampil' => $this->Gallery_model->list_data('gallery')->result()
						);
		$this->load->view('user/template', $data);
	}

	public function contact()
	{
		$data 	= array('content' => $this->folder.'contact');
		$this->load->view('user/template', $data);
	}

}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
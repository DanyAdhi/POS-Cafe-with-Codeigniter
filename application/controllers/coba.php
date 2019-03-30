<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coba extends CI_Controller {


	var $section = 'Dashboard';
	var $i 		 = 'admin/';

	public function index()
	{
		$this->load->view('coba');
	}

}

/* End of file index.php */
/* Location: ./application/controllers/index.php */
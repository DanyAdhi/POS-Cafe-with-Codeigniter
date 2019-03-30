<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}


	function Tampil_barang()
    {
        $this->db->select('*');
        $this->db->from('mbarang');
        $data=$this->db->get();
        return $data;

    }
    function Simpan($table, $data){
        return $this->db->insert($table, $data);
    }

    function Hapus($table,$where){
        return $this->db->delete($table,$where);
    }
	
   

}

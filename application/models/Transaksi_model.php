<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model{

	private $table = 'transaksi' ;


	public function get_all_transaksi()
	{
		return $this->db->get('transaksi');
	}

	public function get_all_transaksi_detail()
	{
		return $this->db->get('transaksi_detail');
	}

	public function get_by_id_transaksi($where)
	{
		return $this->db->get_where('transaksi', array('id_transaksi'=>$where));
	}

	public function get_by_id_transaksi_detail($where)
	{
		return $this->db->get_where('transaksi_detail', array('id_detail'=>$where));
	}

	public function save_transaksi($id,$total,$jml_uang)
	{
		$post = $this->input->post();
		$data = array(
			'id_transaksi' 		=> $id,
			'tgl_transaksi' 	=> date("Y-m-d"),
			'jam_transaksi'  	=> date("H:i:s"),
			'total_transaksi' 	=> $total
		);

		$this->db->insert('transaksi', $data);


		foreach ($this->cart->contents() as $item) {
			$data=array(
				'id_detail' 			=>	null,
				'id_transaksi_d'		=>	$id,
				'kode_menu_d'			=>	$item['id'],
				'nama_menu_d'			=>	$item['name'],
				'harga_d'				=>	$item['price'],
				'jumlah_d'				=>	$item['qty'],
				'total_d'				=>	$item['subtotal'],
			);
			$this->db->insert('transaksi_detail',$data);
		}
		return true;
	}

	public function save_transaksi_detail()
	{
		$post = $this->input->post();
		$this->db->insert('transaksi_detail', $data);
	}


	public function get_month_transaksi()
	{
		return 	$this->db->distinct()
						 ->select('month(tgl_transaksi) as bulan')
						 ->select('year(tgl_transaksi) as tahun')
						 ->order_by('tgl_transaksi','DESC')
						 ->get('transaksi');
	}

	public function get_year_transaksi()
	{
		return 	$this->db->distinct()
						 ->select('year(tgl_transaksi) as tahun')
						 ->order_by('tgl_transaksi','DESC')
						 ->get('transaksi');
	}




}
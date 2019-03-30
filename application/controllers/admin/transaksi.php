<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	var $folder 	= 'Transaksi/';
	var $section 	= 'Transaksi';
	var $i 			= 'admin/';

	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk')!=TRUE){$url=base_url('user');redirect($url);};
		$this->load->library('pdf');
		$this->load->library('form_validation');
		$this->load->model('Menu_model');
		$this->load->model('Transaksi_model');
	}

	public function index()
	{
		$data = array(
			'content' 			=> $this->folder.'transaksi',
			'section'			=> $this->section,
			'i'					=> $this->i,
			'title'				=> 'Transaksi',
			'tampil_modal'		=> $this->Menu_model->get_data_tersedia(),
		);
		$this->load->view('admin/admin', $data);
	}

	public function add_cart()
	{
		$kode_menu 	= $this->input->post('kode_menu');
		$produk 	= $this->Menu_model->newGetData($kode_menu);
		$i 			= $produk->row_array();
		$data = array(
               'id' 			=> $i['kode_menu'],
               'name'      		=> $i['name_menu'],
               'price'    		=> $i['price'],
               'qty'      		=> $this->input->post('qty'),
            );

		if($this->cart->total_items()>0)
		{				
				$id 	 = $items['id'];
				$kobar 	 = $this->input->post('kode_menu');
				if($id==$kobar)
				{
					$up=array(
						'rowid'	=> $rowid,
						);
					$this->cart->update($up);
				}
				else
				{
					$this->cart->insert($data);
				}
		}
		else
		{
			$this->cart->insert($data);
		}
		redirect('admin/transaksi');
	}

	function remove()
	{
			$row_id=$this->uri->segment(4);
			$this->cart->update(array(
	               'rowid'      => $row_id,
	               'qty'     	=> 0
	            ));
			redirect('admin/transaksi');
		
	}

	function save_transaksi()
	{
		// buat no_struk pembayaran atau id_transaksi
		date_default_timezone_set('Asia/Jakarta'); 
      	$time 		= date('dmyHis');
		$row 		= count($this->Transaksi_model->get_all_transaksi()->result());
      	$id 		= $time.'0'.($row+1);
      	$jml_uang 	= preg_replace('/[^0-9\-]/',"",$this->input->post('jml_uang'));
      	$total 		= preg_replace('/[^0-9\-]/',"",$this->input->post('total_transaksi'));
      	$kembali	= preg_replace('/[^0-9\-]/',"",$this->input->post('kembali'));

      	if(!empty($total) && !empty($jml_uang))
      	{
			if($jml_uang < $total){
				$this->session->set_flashdata('flash','kurang_t');
				redirect('admin/transaksi');
			}else{
				$data = ['jml_uang'		=> $jml_uang,
						 'kembali'		=> $kembali,
						 'id_transaksi' => $id,
						 'total_belanja'=> $total];
				$this->session->set_userdata($data);
				$transaksi_proses=$this->Transaksi_model->save_transaksi($id,$total,$jml_uang);
				if($transaksi_proses){
					$this->cart->destroy();
					$this->session->unset_userdata('tglfak');
					redirect('admin/transaksi/cetak');

				}else{
					$this->session->set_flashdata('flash','_t');
					redirect('admin/transaksi');
				}
			}
			
		}else{
			$this->session->set_flashdata('flash','kosong');
			redirect('admin/penjualan');
		}
	}

	public function cetak()
	{
		$data = array(
			'content' 			=> $this->folder.'berhasil',
			'section'			=> $this->section,
			'i'					=> $this->i,
			'title'				=> 'Transaksi',
		);
		$this->load->view('admin/admin', $data);
	}

	public function struk()
	{
		$struk 		= $this->session->userdata('id_transaksi');
		$jml_uang 	= $this->session->userdata('jml_uang');
		$kembali  	= $this->session->userdata('kembali');
		$total 		= $this->session->userdata('total_belanja');
		
		if($struk!=null){

			$pdf = new FPDF();
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(190,7,'Struk Pembelian Cafe' ,0,0,'C');
			$pdf->Cell(10,20,'',0,1); //Jarak

			
			$pdf->SetFont('Arial','',12);
			$pdf->Cell(133,6,'No.Struk  : '.$struk,0,0);
			$pdf->Cell(80,6,'Tunai         : '.number_format($jml_uang,0,'','.'),0,1);
			$pdf->Cell(133,6,'Tanggal   : '.date('d-m-Y H:i:s'),0,0);
			$pdf->Cell(80,6,'kembalian  : '.number_format($kembali,0,'','.'),0,1);
			$pdf->Cell(10,10,'',0,1); //Jarak
			// Start table
				$pdf->SetFont('Arial','B','10');
				$pdf->Cell(10,6,'NO',1,0);
				$pdf->Cell(133,6,'Nama Menu',1,0);
				$pdf->Cell(17,6,'Harga',1,0,'C');
				$pdf->Cell(10,6,'Jml',1,0,'C');
				$pdf->Cell(20,6,'total',1,1,'C');

				$pdf->SetFont('Arial','','10');
				$transaksi = $this->db->select('a.*, b.*')
									  ->from('transaksi as a')
									  ->join('transaksi_detail as b', 'a.id_transaksi=b.id_transaksi_d')
									  ->where('id_transaksi',$struk)
									  ->get()
									  ->result();
				$total=0;
				$no=1;
				foreach($transaksi as $t)
					{
						$pdf->Cell(10,6,$no,1,0,'C');
						$pdf->Cell(133,6,$t->nama_menu_d,1,0);
						$pdf->Cell(17,6,number_format($t->harga_d,0,'','.'),1,0,'R');
						$pdf->Cell(10,6,$t->jumlah_d,1,0,'C');
						$pdf->Cell(20,6,number_format($t->total_d,0,'','.'),1,1,'R');
						
						$no++;
						$total += $t->total_d;
					}
				$pdf->SetFont('Arial','B','10');
				$pdf->Cell(170,8,'Jumlah',1,0,'C');
				$pdf->Cell(20,8,number_format($total,0,'','.'),1,0,'R');
			// End Table

			$pdf->Output();
		}else{
			redirect($this->i.'transaksi');
		}

	}

	public function back()
	{
		$data = ['jml_uang','kembali','total_belanja','id_transaksi'];
		$this->session->unset_userdata($data);
		redirect($this->i.'transaksi');
	}


}

/* End of file transaksi.php */
/* Location: ./application/controllers/admin/transaksi.php */
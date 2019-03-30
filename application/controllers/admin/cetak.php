<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller{

	var $folder 	= 'Cetak/';
	var $section 	= 'Laporan';
	var $i 			= 'admin/';

	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){$url=base_url('user'); redirect($url);};
		$this->load->library('pdf');
		$this->load->model('Menu_model');
		$this->load->model('Transaksi_model');
	}

	public function index()
	{

		$data = array(
			'content' 	=> $this->folder.'laporan',
			'section'	=> $this->section,
			'i'			=> $this->i,
			'title'		=> 'Laporan',
			'tampil'	=> $this->Transaksi_model->get_all_transaksi()->result(),
			'bulan'		=> $this->Transaksi_model->get_month_transaksi()->result_array(),
			'tahun'		=> $this->Transaksi_model->get_year_transaksi()->result()

		);
		$this->load->view('admin/admin', $data);
	}

	public function print_all()
	{

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(190,7,'Laporan Seluruh Penjualan Cafe',0,0,'C');
		$pdf->Cell(10,15,'',0,1); //Jarak
		// Start table
			$pdf->SetFont('Arial','B','10');
			$pdf->Cell(10,6,'NO',1,0);
			$pdf->Cell(30,6,'No Struk',1,0);
			$pdf->Cell(30,6,'Tanggal',1,0);
			$pdf->Cell(15,6,'kode',1,0);
			$pdf->Cell(58,6,'Nama Menu',1,0);
			$pdf->Cell(17,6,'Harga',1,0,'C');
			$pdf->Cell(10,6,'Jml',1,0,'C');
			$pdf->Cell(20,6,'total',1,1,'C');

			$transaksi = $this->db->select('a.*, b.*')
					 			  ->from('transaksi as a')
					 			  ->join('transaksi_detail as b', 'a.id_transaksi=b.id_transaksi_d')
					 			  ->get()
					 			  ->result();
			$total=0;
			$no=1;
			foreach($transaksi as $t)
				{
					$pdf->Cell(10,6,$no,1,0,'C');
					$pdf->Cell(30,6,$t->id_transaksi,1,0);
					$pdf->Cell(30,6,$this->tgl_indo(date('Y-m-d', strtotime($t->tgl_transaksi))),1,0);
					$pdf->Cell(15,6,$t->kode_menu_d,1,0);
					$pdf->Cell(58,6,$t->nama_menu_d,1,0);
					$pdf->Cell(17,6,number_format($t->harga_d,0,'','.'),1,0,'R');
					$pdf->Cell(10,6,$t->jumlah_d,1,0,'C');
					$pdf->Cell(20,6,number_format($t->total_d,0,'','.'),1,1,'R');
					
					$no++;
					$total += $t->total_d;
				}

			$pdf->Cell(170,8,'Jumlah',1,0,'C');
			$pdf->Cell(20,8,number_format($total,0,'','.'),1,0,'R');
		// End Table

		// TTD
			$tgl= $this->tgl_indo(date('Y-m-d'));
			$pdf->Cell(15,18,'',0,1);
			$pdf->Cell(190,7,'Lubuk Linggau, '.$tgl,0,0, 'R');
			$pdf->Cell(15,20,'',0,1);
			$pdf->Cell(185,7,'(Dany Adhi Prabowo)',0,0,'R');

		// End TTD


		$pdf->Output();
	}

	public function date()
	{
		$date = $this->input->post('tgl');

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(190,7,'Laporan Penjualan Cafe Pertanggal' ,0,0,'C');
		$pdf->Cell(10,15,'',0,1); //Jarak
		// Start table
			$pdf->SetFont('Arial','B','10');
			$pdf->Cell(10,6,'NO',1,0);
			$pdf->Cell(30,6,'No Struk',1,0);
			$pdf->Cell(30,6,'Tanggal',1,0);
			$pdf->Cell(15,6,'kode',1,0);
			$pdf->Cell(58,6,'Nama Menu',1,0);
			$pdf->Cell(17,6,'Harga',1,0,'C');
			$pdf->Cell(10,6,'Jml',1,0,'C');
			$pdf->Cell(20,6,'total',1,1,'C');

			$transaksi = $this->db->select('a.*, b.*')
								  ->from('transaksi as a')
								  ->join('transaksi_detail as b', 'a.id_transaksi=b.id_transaksi_d')
								  ->where('tgl_transaksi',$date)
								  ->get()
								  ->result();
			$total=0;
			$no=1;
			foreach($transaksi as $t)
				{
					$pdf->Cell(10,6,$no,1,0,'C');
					$pdf->Cell(30,6,$t->id_transaksi,1,0);
					$pdf->Cell(30,6,$this->tgl_indo(date('Y-m-d', strtotime($t->tgl_transaksi))),1,0);
					$pdf->Cell(15,6,$t->kode_menu_d,1,0);
					$pdf->Cell(58,6,$t->nama_menu_d,1,0);
					$pdf->Cell(17,6,number_format($t->harga_d,0,'','.'),1,0,'R');
					$pdf->Cell(10,6,$t->jumlah_d,1,0,'C');
					$pdf->Cell(20,6,number_format($t->total_d,0,'','.'),1,1,'R');
					
					$no++;
					$total += $t->total_d;
				}

			$pdf->Cell(170,8,'Jumlah',1,0,'C');
			$pdf->Cell(20,8,number_format($total,0,'','.'),1,0,'R');
		// End Table

		// TTD
			$tgl= $this->tgl_indo(date('Y-m-d'));
			$pdf->Cell(15,18,'',0,1);
			$pdf->Cell(190,7,'Lubuk Linggau, '.$tgl,0,0, 'R');
			$pdf->Cell(15,20,'',0,1);
			$pdf->Cell(185,7,'(Dany Adhi Prabowo)',0,0,'R');

		// End TTD


		$pdf->Output();
	}

	public function month()
	{
		$bulan 	= explode('-', $this->input->post('bln'));
		$year  	= $bulan[1];
		$month  = $bulan[0];

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(190,7,'Laporan Penjualan Cafe Perbulan' ,0,0,'C');
		$pdf->Cell(10,15,'',0,1); //Jarak
		// Start table
			$pdf->SetFont('Arial','B','10');
			$pdf->Cell(10,6,'NO',1,0);
			$pdf->Cell(30,6,'No Struk',1,0);
			$pdf->Cell(30,6,'Tanggal',1,0);
			$pdf->Cell(15,6,'kode',1,0);
			$pdf->Cell(58,6,'Nama Menu',1,0);
			$pdf->Cell(17,6,'Harga',1,0,'C');
			$pdf->Cell(10,6,'Jml',1,0,'C');
			$pdf->Cell(20,6,'total',1,1,'C');

			$transaksi = $this->db->select('a.*, b.*')
								->from('transaksi as a')
								->join('transaksi_detail as b', 'a.id_transaksi=b.id_transaksi_d')
								->where('year(tgl_transaksi)',$year)
								->where('month(tgl_transaksi)',$month)
								->get()
								->result();
			$total=0;
			$no=1;
			foreach($transaksi as $t)
				{
					$pdf->Cell(10,6,$no,1,0,'C');
					$pdf->Cell(30,6,$t->id_transaksi,1,0);
					$pdf->Cell(30,6,$this->tgl_indo(date('Y-m-d', strtotime($t->tgl_transaksi))),1,0);
					$pdf->Cell(15,6,$t->kode_menu_d,1,0);
					$pdf->Cell(58,6,$t->nama_menu_d,1,0);
					$pdf->Cell(17,6,number_format($t->harga_d,0,'','.'),1,0,'R');
					$pdf->Cell(10,6,$t->jumlah_d,1,0,'C');
					$pdf->Cell(20,6,number_format($t->total_d,0,'','.'),1,1,'R');
					
					$no++;
					$total += $t->total_d;
				}

			$pdf->Cell(170,8,'Jumlah',1,0,'C');
			$pdf->Cell(20,8,number_format($total,0,'','.'),1,0,'R');
		// End Table

		// TTD
			$tgl= $this->tgl_indo(date('Y-m-d'));
			$pdf->Cell(15,18,'',0,1);
			$pdf->Cell(190,7,'Lubuk Linggau, '.$tgl,0,0, 'R');
			$pdf->Cell(15,20,'',0,1);
			$pdf->Cell(185,7,'(Dany Adhi Prabowo)',0,0,'R');

		// End TTD


		$pdf->Output();
	}


	public function year()
	{
		$year = $this->input->post('tahun');

		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Cell(190,7,'Laporan Penjualan Cafe Perbulan' ,0,0,'C');
		$pdf->Cell(10,15,'',0,1); //Jarak
		// Start table
			$pdf->SetFont('Arial','B','10');
			$pdf->Cell(10,6,'NO',1,0);
			$pdf->Cell(30,6,'No Struk',1,0);
			$pdf->Cell(30,6,'Tanggal',1,0);
			$pdf->Cell(15,6,'kode',1,0);
			$pdf->Cell(58,6,'Nama Menu',1,0);
			$pdf->Cell(17,6,'Harga',1,0,'C');
			$pdf->Cell(10,6,'Jml',1,0,'C');
			$pdf->Cell(20,6,'total',1,1,'C');

			$transaksi = $this->db->select('a.*, b.*')
								->from('transaksi as a')
								->join('transaksi_detail as b', 'a.id_transaksi=b.id_transaksi_d')
								->where('year(tgl_transaksi)',$year)
								->get()
								->result();
			$total=0;
			$no=1;
			foreach($transaksi as $t)
				{
					$pdf->Cell(10,6,$no,1,0,'C');
					$pdf->Cell(30,6,$t->id_transaksi,1,0);
					$pdf->Cell(30,6,$this->tgl_indo(date('Y-m-d', strtotime($t->tgl_transaksi))),1,0);
					$pdf->Cell(15,6,$t->kode_menu_d,1,0);
					$pdf->Cell(58,6,$t->nama_menu_d,1,0);
					$pdf->Cell(17,6,number_format($t->harga_d,0,'','.'),1,0,'R');
					$pdf->Cell(10,6,$t->jumlah_d,1,0,'C');
					$pdf->Cell(20,6,number_format($t->total_d,0,'','.'),1,1,'R');
					
					$no++;
					$total += $t->total_d;
				}

			$pdf->Cell(170,8,'Jumlah',1,0,'C');
			$pdf->Cell(20,8,number_format($total,0,'','.'),1,0,'R');
		// End Table

		// TTD
			$tgl= $this->tgl_indo(date('Y-m-d'));
			$pdf->Cell(15,18,'',0,1);
			$pdf->Cell(190,7,'Lubuk Linggau, '.$tgl,0,0, 'R');
			$pdf->Cell(15,20,'',0,1);
			$pdf->Cell(185,7,'(Dany Adhi Prabowo)',0,0,'R');

		// End TTD


		$pdf->Output();
	}

	public function struk()
	{
		$struk 		= $this->uri->segment(4);
		$jml_uang 	= $this->session->userdata('jml_uang');
		$kembali  	= $this->session->userdata('kembali');

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
	}


	public function view()
	{
		$year= '2019';
		$month= '01';
		$join = $this->db->select('a.*, b.*')
								->from('transaksi as a')
								->join('transaksi_detail as b', 'a.id_transaksi=b.id_transaksi_d')
								->where('year(tgl_transaksi)',$year)
								->where('month(tgl_transaksi)',$month)
								->get()
								->result();

		$data = array(
			'content' 	=> 'cetak/cetak',
			'section' 	=> 'Transaksi',
			'i' 	  	=> 'Transaksi',
			'title'		=> 'Transaksi',
			'tampil'	=> $join
		);

		$this->load->view('admin/admin', $data);
	}


	function tgl_indo($tanggal)
	{
		$bulan = array(
			1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober','November','Desember'
		);
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2].' '.$bulan[(int)$pecahkan[1]].' '.$pecahkan[0];
	}


}
?>
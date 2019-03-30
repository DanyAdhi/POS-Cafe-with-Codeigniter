<?php 
function tgl_indo($tanggal)
	{
		$bulan = array(
			1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni','Juli','Agustus','September','Oktober','November','Desember'
		);
		$pecahkan = explode('-', $tanggal);
		return $pecahkan[2].' '.$bulan[(int)$pecahkan[1]].' '.$pecahkan[0];
	}
 ?>

<table class="table">
	<tr>
		<th>No</th>
		<th>No Struk</th>
		<th>Tanggal</th>
		<th>Kode Menu</th>
		<th>Nama Menu</th>
		<th>Harga</th>
		<th>Jumlah</th>
		<th>total</th>
	</tr>
	
	<?php 
		$no=1;
		foreach($tampil as $t){ ?>
	<tr>
		<td><?=$no?></td>	
		<td><?=$t->id_transaksi?></td>	
		<td><?=tgl_indo(date('Y-m-d', strtotime($t->tgl_transaksi)))?></td>	
		<!-- <td><?=date('d F Y', strtotime($t->tgl_transaksi))?></td>	 -->
		<td><?=$t->kode_menu_d?></td>
		<td><?=$t->nama_menu_d?></td>
		<td><?=$t->harga_d?></td>
		<td><?=$t->jumlah_d?></td>
		<td><?=$t->total_d?></td>

	</tr>
		<?php 
		$no++;
		} ?>

</table>
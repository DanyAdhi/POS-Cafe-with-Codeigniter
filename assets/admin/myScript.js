//FLASH DATA INPUT MENU.
const flashData = $('.flash-data').data('flashdata');
// console.log(flashData);
if (flashData=='input'){
	swal({
		title: "Berhasil",
		text: "Data berhasil disimpan",
		type: "success",
	});
}
if (flashData=='empty'){
	swal({
		title: "Gagal",
		text: "Form tidak boleh kosong !",
		type: "warning",
	});
}
if (flashData=='duplicate'){
	swal({
		title: "Gagal",
		text: "Kode Menu tidak boleh sama !",
		type: "warning",
	});
}


// VIEW MENU
if (flashData=='delete'){
	swal({
		title: "Berhasil",
		text: "Data berhasil dihapus",
		type: "success",
	});
}

if (flashData=='update'){
	swal({
		title: "Berhasil",
		text: "Data berhasil diubah",
		type: "success",
	});
}

if (flashData=='fail'){
	swal({
		title: "Gagal",
		text: "Form tidak boleh kosong!",
		type: "warning",
	});
}

if (flashData=='kurang_t'){
      swal({
            title : "Gagal",
            text  : "Jumlah Uang yang anda masukan Kurang !",
            type  : "error",
      });
}

if(flashData=='kosong_t'){
      swal({
            title : "Gagal",
            text  : "Transaksi Gagal Disimpan, Mohon Periksa Kembali Semua Inputan Anda!",
            type  : "warning",
      });
}

if(flashData=='gagal_t'){
      swal({
            title : "gagal",
            text  : "Transaksi Gagal Disimpan !",
            type  : "error"
      });
}

if(flashData=='add_user'){
	swal({
		title 	: 'Berhasil',
		text 	: 'Data User Berhasil Ditambahkan',
		type 	: 'success'
	});
}

if(flashData=='reset'){
	swal({
		title 	: 'Berhasil',
		text	: 'Password Berhasil Direset',
		type	: 'success'
	});
}

      	
// HAPUS DATA

function deleteConfirm(url){
	$('#btn-delete').attr('href', url);
	$('#deleteModal').modal();
}


	// function deleteConfirm(url){
	// 	$('#btn-delete').attr('href', url);
	// 	$('#deleteModal').modal();
	// }


// CHART


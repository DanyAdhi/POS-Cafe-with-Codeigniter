<!DOCTYPE html>
<html lang="en">
<head>
  <title>INPUT AJAX</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?=base_url('assets/bootstrap4/css/bootstrap.min.css')?>">

 
</head>
<body>
<div class="container">
<form id="form_barang">
  <h1>INPUT BARANG USING AJAX</h1>
  <HR>
  <div class="form-group">
    <label>Nama Barang:</label>
    <input type="text" class="form-control" name="nama">
  </div>
  <div class="form-group">
    <label>Harga:</label>
    <input type="text" class="form-control" name="harga">
  </div>
  
  <button id="submit" class="btn btn-default">Submit</button>
</form>

<hr>
  <h2>List Barang</h2>
  <p>Berikut adalah barang yang telah diinputkan</p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Nama Barang</th>
        <th>Harga</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody id="list_barang">

    </tbody>
  </table>


</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
                  $(document).ready(function() {
                     //untuk simpan barang     
                    $("#submit").click(function(){
                        
                         $.ajax({
                           
                           url : "<?php echo base_url(); ?>index.php/Mbarang/savedata", 
                           type: "POST", 
                           data: $("#form_barang").serialize(),
                             success: function(data) {
                            
                            $('#list_barang').html(data);
                            }
                         });
                          
                        return false;
                       
                     });
                    //**end**

                    //untuk load list barang di awal
                    $('#list_barang').load("<?php echo base_url();?>index.php/Mbarang/list_barang");
                    //**end**

                    //untuk delete barang
                    $(document).on('click','.hapus_barang',function(){
                      var row_id=$(this).attr("id"); 
                      $.ajax({
                        url : "<?php echo base_url();?>index.php/Mbarang/hapus_barang",
                        method : "POST",
                        data : {row_id : row_id},
                        success :function(data){
                           $('#list_barang').html(data);
                        }
                      });
                    });

                    //**end**

                  });
</script>


</body>
</html>
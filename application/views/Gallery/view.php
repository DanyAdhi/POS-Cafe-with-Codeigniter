<style type="text/css">
  .dataTables_filter, .dataTables_length{
    display: none;
  }
</style>

<div class="flash-data" data-flashdata="<?=$this->session->flashdata('flash') ?>"></div>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class=" mb-4 text-center">
        <h3 class="title"><?=$title?></h3>
        <hr width="150px">
      </div>
      <!-- Data Biasa -->
	      <!-- <form id="formUpload">
	        <div class="form-group ">
	          <label class="control-label font-weight-bold">Upload Gambar</label>
	          <input class="form-control w-75" type="text" name="image">
	        </div>
	      </form>
        <button onclick="uploadData()" class="btn btn-primary mb-5" >Upload</button> -->
      <!-- END -->

      <!-- Upload Gambar -->
      <form id="formUpload" >
        <div class="form-group ">
          <label class="control-label font-weight-bold">Upload Gambar</label>
          <input class="form-control w-75" type="file" name="gambar">
        </div>
      <button id="upload" type="submit" class="btn btn-primary mb-5" >Upload</button>
      </form>


      <div class="tile-body pt-5">

      	<table class="table table-hover table-bordered data" id="dati">
            <thead>
              <tr>
                <th>Gambar</th>
                <th>Ukuran</th>
                <th>tanggal Upload</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="barisData">
            </tbody>
          </table>

      </div>
    </div>
  </div>
</div>


<!-- <script type="text/javascript">
  $('.dataTables_filter').css('display':'hidden');
</script>
 -->
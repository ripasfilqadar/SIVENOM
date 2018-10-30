<?php
$url = 'UserPegawai/create';
$state = 'Tambah';
if(isset($isEdit)){
  $url ='UserPegawai/update/'.$id;
  $state ='Edit';
}else{
  $isEdit = false;
}
?>
<form id="myform" method="POST" role="form" action=<?= site_url($url);?> enctype="multipart/form-data" autocomplete="off">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Form <?php echo $state?> User</h4>
      <div class="row">
        <div class="col-md-12">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            <div class="form-group">
                <label >Nama</label>
                <input type="text" class="form-control" name="Nama" placeholder="">
              </div>
              <div class="form-group">
                <label >NIP</label>
                <input type="text" class="form-control" name="NIP" placeholder="">
              </div>
              <div class="form-group">
                <label >Email</label>
                <input type="text" class="form-control" name="Email" placeholder="">
              </div>
              <div class="form-group">
                <label >Alamat</label>
                <input type="text" class="form-control" name="Alamat" placeholder="" value="">
              </div>
              <div class="form-group">
                <label >Password</label>
                <input type="password" class="form-control" name="Password" placeholder="" value="">
              </div>
            </div>
          </div>
          <!-- /.box-body -->
        </div>
        </div>
      </div>
    </div>
    <div class="modal-body" id="content-placeholder">

    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
  <!-- /.modal-content -->

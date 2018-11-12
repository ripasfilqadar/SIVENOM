<?php
$url = 'Vendor/create';
$state = 'Tambah';
if(isset($isEdit)){
  $url ='Vendor/update/'.$id;
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
        <h4 class="modal-title">Form <?$state?> Vendor</h4>
        <div class="row">
          <div class="col-md-12">
          <div class="box-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label >Nama Vendor</label>
                  <input type="text" class="form-control" name="NamaVendor" placeholder="" value="<?php if($isEdit) echo $data['NamaVendor']?>" >
                </div>
                <div class="form-group">
                  <label >Keterangan</label>
                  <input type="text" class="form-control" name="Keterangan" placeholder="" value="<?php if($isEdit)  echo $data['Keterangan']?>" >
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
      <a href="<?=site_url('Vendor');?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button></a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    </form>
    <!-- /.modal-content -->

<?php
$url = 'Kontrak/create';
$state = 'Tambah';
if(isset($isEdit)){
  $url ='Kontrak/update/'.$id;
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
      <h4 class="modal-title">Form <?php echo $state?> Kontrak</h4>
      <div class="row">
        <div class="col-md-12">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Vendor</label>
                <select class="form-control" name="VendorId" value="<?php if($isEdit) echo $data['VendorId']?>">
                  <?php foreach ($vendors as $vendor) {
                    ?>
                    <option value="<?php echo $vendor['VendorId']?>"><?php echo $vendor['NamaVendor']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Pegawai</label>
                <select class="form-control" name="UserId" value="<?php if($isEdit) echo $data['UserId']?>">
                  <?php foreach ($pegawais as $pegawai) {
                    ?>
                    <option value="<?php echo $pegawai['UserId']?>"><?php echo $pegawai['Nama']?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label >No Kontrak</label>
                <input type="text" class="form-control" name="NoKontrak" placeholder="" value="<?php if($isEdit) echo $data['NoKontrak']?>">
              </div>
              <div class="form-group">
                <label >Deskripsi</label>
                <textarea class="form-control" name="Deskripsi" placeholder=""> <?php if($isEdit) echo $data['Deskripsi']?> </textarea>
              </div>
              <div class="form-group">
                <label >SLA</label>
                <input type="text" class="form-control" name="SLA" placeholder="" value="<?php if($isEdit) echo $data['SLA']?>">
              </div>
              <div class="form-group">
                <label >Response Time</label>
                <input type="text" class="form-control" name="ResponseTime" placeholder="" value="<?php if($isEdit) echo $data['ResponseTime']?>">
              </div>
              <div class="form-group">
                <label >Pengali Denda</label>
                <input type="number" class="form-control" name="PengaliDenda" placeholder="" value="<?php if($isEdit) echo $data['PengaliDenda']?>">
              </div>
              <div class="form-group">
                <label >Problem Solving</label>
                <input type="text" class="form-control" name="ProblemSolving" placeholder="" value="<?php if($isEdit) echo $data['ProblemSolving']?>">
              </div>
              <div class="form-group">
                <label >PS Suku Cadang</label>
                <input type="text" class="form-control" name="PSSukuCadang" placeholder="" value="<?php if($isEdit) echo $data['PSSukuCadang']?>">
              </div>
              <div class="form-group">
                <label >Harga Kehadiran DC</label>
                <input type="number" class="form-control" name="HargaKehadiranDC" placeholder="" value="<?php if($isEdit) echo $data['HargaKehadiranDC']?>">
              </div>
              <div class="form-group">
                <label >Harga Kehadiran DRC</label>
                <input type="number" class="form-control" name="HargaKehadiranDRC" placeholder="" value="<?php if($isEdit) echo $data['HargaKehadiranDRC']?>">
              </div>
              <div class="form-group">
                <label >Tanggal Kontrak</label>
                <input type="date" class="form-control" name="TanggalKontrak" placeholder="" value="<?php if($isEdit) echo $data['TanggalKontrak']?>">
              </div>
              <div class="form-group">
                <label >Kontrak Kehadiran DC</label>
                <input type="number" class="form-control" name="KontrakKehadiranDC" placeholder="" value="<?php if($isEdit) echo $data['KontrakKehadiranDC']?>">
              </div>
              <div class="form-group">
                <label >Kontrak Kehadiran DRC</label>
                <input type="number" class="form-control" name="KontrakKehadiranDRC" placeholder="" value="<?php if($isEdit) echo $data['KontrakKehadiranDRC']?>">
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
    <a href="<?=site_url('Kontrak');?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button></a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
  <!-- /.modal-content -->

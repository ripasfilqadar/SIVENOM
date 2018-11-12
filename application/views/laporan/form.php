<?php
$url = 'Laporan/CreateLaporan/'.$id;
$state = 'Tambah';
if(isset($isEdit)){
  $url ='Laporan/update/'.$id;
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
      <h4 class="modal-title">Form <?php echo $state?> Laporan</h4>
      <div class="row">
        <div class="col-md-12">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label >Kontrak Kehadiran DC</label>
                <input type="text" <?php if($current_user->Role != 'Pegawai') echo "disabled";?> class="form-control" name="KehadiranDC" placeholder="" value="<?php if($isEdit) echo $data['KehadiranDC']?>">
              </div>
              <div class="form-group">
                <label >Realisasi Kehadiran DC</label>
                <input type="text" <?php if($current_user->Role != 'Vendor') echo "disabled";?>  class="form-control" name="RealisasiKehadiranDC" placeholder="" value="<?php if($isEdit) echo $data['RealisasiKehadiranDC']?>">
              </div>
              <div class="form-group">
                <label >Kontrak Kehadiran DRC</label>
                <input type="text" <?php if($current_user->Role != 'Pegawai') echo "disabled";?>  class="form-control" name="KehadiranDRC" placeholder="" value="<?php if($isEdit) echo $data['KehadiranDRC']?>">
              </div>
              <div class="form-group">
                <label >Realisasi Kehadiran DRC</label>
                <input type="text" <?php if($current_user->Role != 'Vendor') echo "disabled";?> class="form-control" name="RealisasiKehadiranDRC" placeholder="" value="<?php if($isEdit) echo $data['RealisasiKehadiranDRC']?>">
              </div>
              <div class="form-group">
                <label >Realisasi SLA</label>
                <input type="text" class="form-control" <?php if($current_user->Role != 'Vendor') echo "disabled";?> name="RealisasiSLA" placeholder="" value="<?php if($isEdit) echo $data['RealisasiSLA']?>">
              </div>
              <div class="form-group">
                <label >Response Time(menit)</label>
                <input type="text" class="form-control" <?php if($current_user->Role != 'Vendor') echo "disabled";?> name="ResponseTime" placeholder="" value="<?php if($isEdit) echo $data['ResponseTime']?>">
              </div>
              <div class="form-group">
                <label >Problem Solving</label>
                <input type="text" class="form-control" <?php if($current_user->Role != 'Vendor') echo "disabled";?> name="ProblemSolving" placeholder="" value="<?php if($isEdit) echo $data['ProblemSolving']?>">
              </div>
              <div class="form-group">
                <label >Suku Cadang</label>
                <input type="text" class="form-control" <?php if($current_user->Role != 'Vendor') echo "disabled";?> name="SukuCadang" placeholder="" value="<?php if($isEdit) echo $data['SukuCadang']?>">
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
    <a href="<?=site_url('Kontrak/detail/2');?>"><button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button></a>
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
  <!-- /.modal-content -->

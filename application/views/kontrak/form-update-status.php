<form id="myform" method="POST" role="form" action=<?= site_url('laporan/updateStatus');?> enctype="multipart/form-data" autocomplete="off">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Ubah Status Laporan</h4>
      <div class="row">
        <div class="col-md-12">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Status</label>
                <select class="form-control" name="Status">
                  <?php foreach ($refMaster as $status) {
                    ?>
                    <option value="<?php echo $status['Id']?>"><?php echo $status['Value']?></option>
                  <?php } ?>

                </select>
                <input type="hidden" class="form-control" name="LaporanId" placeholder="">
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

<script>
$(document).ready(() => {
  $("#LaporanTable").on("click",".js-btn-update-status",function(){
    var button=this;
    var tr=$(button.closest("tr")).get();
    let dataLaporan = $(tr[0]).data('laporan');
  
    $("#modal-st-update-status form input[name='Status'").val(dataLaporan.Status);
    $("#modal-st-update-status form input[name='LaporanId'").val(dataLaporan.LaporanId);
    $("#modal-st-update-status").modal("show");
  });
})

</script>
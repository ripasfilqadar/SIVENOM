<form id="myform" method="POST" role="form" action=<?= site_url('user/ChangePassword');?> enctype="multipart/form-data" autocomplete="off">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Ubah Password</h4>
      <div class="row">
        <div class="col-md-12">
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label >Old Password </label>
                <input type="password" class="form-control" name="OldPassword" placeholder=""  >
              </div>
              <div class="form-group">
                <label >New Password</label>
                <input type="password" class="form-control" name="NewPassword" placeholder="" >
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
      <button type="submit" class="btn btn-primary">Ubah Password</button>
    </div>
  </div>
  </form>
  <!-- /.modal-content -->

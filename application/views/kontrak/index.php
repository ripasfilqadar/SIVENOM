<?php
// print_r($userVendor);
// die();
?>
<script src="<?= base_url('assets/'); ?>dist/js/handlebars-v4.0.11.js"></script>
<script type="text/javascript">
  <?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
  <?php }else if($this->session->flashdata('error')){  ?>
      toastr.error("<?php echo $this->session->flashdata('error'); ?>");
  <?php } ?>
</script>
<?php $this->view('kontrak/delete');?>
<!-- Modal -->
<div class="modal fade" id="modal-st">
  <div class="modal-dialog modal-lg">
    <?php $this->view('kontrak/form');?>
  </div>
</div>
<!-- /.modal -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
          Kontrak
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Kontrak</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="text" class="form-control" name="cari" id="cari" placeholder="Masukan Kata Pencarian ....">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div style="float: right;margin-bottom: 10px">

                  <?php if($current_user->Role == 'Pegawai'){ ?>
                    <a class="btn btn-sm btn-info btn-flat pull-right open-modal-st" data-toggle="modal" data-target="#modal-st"><i class="fa fa-plus"></i></a>
                  <?php } ?>
                  </div>
                  <table id="kontrakTable" class="table table-bordered table-hover jambo_table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                          <th>Nama Vendor</th>
                          <th>Nama Pegawai</th>
                          <th>NO Kontrak</th>
                          <th>Deskripsi</th>
                          <th>SLA</th>
                          <!-- <th>TanggalPembuatan</th> -->
                          <th>Tanggal Kontrak</th>
                          <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      foreach ($kontraks as $kontrak){
                        ?>
                      <tr data-kontrak='<?php echo json_encode($kontrak)?>'>
                        <td> <?php echo $kontrak['NamaVendor'];?> </td>
                        <td> <?php echo $kontrak['Nama'];?> </td>
                        <td> <?php echo $kontrak['NoKontrak'];?> </td>
                        <td> <?php echo $kontrak['Deskripsi'];?> </td>
                        <td> <?php echo $kontrak['SLA'];?> </td>
                        <!-- <td> <?php echo $kontrak['TanggalPembuatan'];?> </td> -->
                        <td> <?php echo $kontrak['TanggalKontrak'];?> </td>
                        <td>
                        <a href="<?php echo site_url('Kontrak/detail/'.$kontrak['KontrakId']);?>">
                          <button type="button" class="btn btn-primary js-btn-delete" aria-label="Left Align">
                            <span class=" glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                          </button>
                        </a>
                        <a href="<?php echo site_url('Kontrak/edit/'.$kontrak['KontrakId']);?>">
                          <button type="button" class="btn btn-info " aria-label="Left Align">
                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                          </button>
                        </a>
                        <button type="button" class="btn btn-danger js-btn-delete" aria-label="Left Align">
                          <span class="glyphicon  glyphicon-trash" aria-hidden="true"></span>
                        </button>
                        </td>
                      </tr>
                      <?php }?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div><!-- /.box-body -->


          </div><!-- /.box -->
          <div class="box box-primary" style="display: none" id="st-detail">
            <div class="box-header with-border">
              <h3 class="box-title">Detail</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
              </div>
            </div><!-- /.box-header -->
            <div class="box-body" id="body-detail">

            </div><!-- /.box-body -->


          </div><!-- /.box -->

          <div class="row">
            <div class="col-md-6">

            </div><!-- /.col (left) -->
            <div class="col-md-6">

              <!-- iCheck -->

            </div><!-- /.col (right) -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
$(document).ready(function() {
        var data = [];
        for ( var i=0 ; i<50000 ; i++ ) {
            data.push( [ i, i, i, i, i ] );
        }

        $('#example').DataTable( {
            data:           data,
            deferRender:    true,
            scrollY:        200,
            scrollCollapse: true,
            scroller:       true
        } );
    } );
</script>
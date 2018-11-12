<?php
$totalDenda = hitungDendaKontrakDC($kontrak, $reports);
?>
<script src="<?= base_url('assets/'); ?>dist/js/handlebars-v4.0.11.js"></script>
<script type="text/javascript">
  <?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
  <?php }else if($this->session->flashdata('error')){  ?>
      toastr.error("<?php echo $this->session->flashdata('error'); ?>");
  <?php } ?>
</script>
<?php $this->view('laporan/delete');?>
<!-- Modal -->
<div class="modal fade" id="modal-st">
  <div class="modal-dialog modal-lg">
    <?php $this->view('laporan/form');?>
  </div>
</div>
<div class="modal fade js-modal-detail" id="modal-st-detail-laporan">
  <div class="modal-dialog modal-lg">
    <?php $this->view('laporan/detail');?>
  </div>
</div>
<div class="modal fade" id="modal-st-update-status">
  <div class="modal-dialog modal-lg">
    <?php $this->view('kontrak/form-update-status');?>
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
              <div class=row col-md-12>
                <table class="table " width="100%">
                  <tr>
                    <td width="24%"><b>No. Kontrak</b></td>
                    <td width="1%">:</td>
                    <td width="24%"><?= $kontrak['NoKontrak']; ?></td>
                    <td width="24%"><b>Nama Vendor</b></td>
                    <td width="1%">:</td>
                    <td width="24%"><?= $kontrak['NamaVendor']; ?></td>
                  </tr>
                  <tr>
                    <td width="15%"><b>Deskripsi Kontrak</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['Deskripsi']; ?></td>
                    <td width="15%"><b>Tanggal Kontrak</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['TanggalKontrak']; ?></td>
                  </tr>
                  <tr>
                    <td width="25%"><b>Problem Solving</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['ProblemSolving']; ?></td>
                    <td width="25%"><b>PS Suku Cadang</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['PSSukuCadang']; ?></td>
                  </tr>
                  <tr>
                    <td width="25%"><b>SLA</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['SLA']; ?></td>
                    <td width="25%"><b>Response Time</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['ResponseTime']; ?></td>
                  </tr>
                  <tr>
                    <td width="25%"><b> Kontrak kehadiran DC</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['KontrakKehadiranDC']; ?></td>
                    <td width="25%"><b>Harga kehadiran DC</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['HargaKehadiranDC']; ?></td>
                  </tr>
                  <tr>
                    <td width="25%"><b>Kontrak kehadiran DRC</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['KontrakKehadiranDRC']; ?></td>
                    <td width="25%"><b>Harga kehadiran DRC</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['HargaKehadiranDRC']; ?></td>
                  </tr>
                  <tr>
                    <td width="25%"><b>Total Denda DC</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $totalDenda['TotalDendaDC']; ?></td>
                    <td width="25%"><b>Total Denda DRC</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $totalDenda['TotalDendaDRC']; ?></td>
                  </tr>
                  <tr>
                    <td width="25%"><b>Pengali Denda</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $kontrak['PengaliDenda']; ?></td>
                    <td width="25%"><b>Total Denda</b></td>
                    <td width="1%">:</td>
                    <td width="15%"><?= $totalDenda['TotalDenda']; ?></td>
                  </tr>
                </table>
              </div>
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
                  <table id="LaporanTable" class="table table-bordered table-hover jambo_table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                        <!-- <th>Kontrak Kehadiran DC</th>
                        <th>Realisasi Kehadiran DC</th>
                        <th>Kontrak Kehadiran DRC</th>
                        <th>Realisasi Kehadiran DRC</th> -->
                        <th>Tanggal Pembuatan</th>
                        <!-- <th>Realisasi SLA</th> -->
                        <th> Status </th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php

                      foreach ($reports as $report){
                        ?>
                      <tr data-laporan='<?php echo json_encode($report)?>' data-denda='<?php echo json_encode(hitungDenda($kontrak, $report))?>'>
                        <!-- <td> <?php echo $report['RealisasiKehadiranDC'];?> </td>
                        <td> <?php echo $report['KehadiranDC'];?> </td>
                        <td> <?php echo $report['RealisasiKehadiranDRC'];?> </td>
                        <td> <?php echo $report['KehadiranDRC'];?> </td> -->
                        <td> <?php echo $report['CreatedAt'];?> </td>
                        <!-- <td> <?php echo $report['RealisasiSLA'];?> </td> -->
                        <td> <?php echo $report['Value'];?> </td>
                        <td>
                        <?php
                        if($report['Value'] != 'Approved') { ?>
                          <a href="<?php echo site_url('Laporan/edit/'.$report['LaporanId']);?>">
                            <button type="button" class="btn btn-info " aria-label="Left Align">
                              <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                            </button>
                          </a>
                        <?php } ?>

                          <button type="button" class="btn btn-success js-detail-laporan " aria-label="Left Align">
                              <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                            </button>
                          <?php
                        if($current_user->Role != 'Vendor') {?>
                          <button type="button" class="btn btn-danger js-btn-delete" aria-label="Left Align">
                            <span class="glyphicon  glyphicon-trash" aria-hidden="true"></span>
                          </button>
                          <button type="button" class="btn btn-info js-btn-update-status" aria-label="Left Align">
                            <span class="glyphicon  glyphicon-tasks" aria-hidden="true"></span>
                          </button>
                        <?php }?>

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

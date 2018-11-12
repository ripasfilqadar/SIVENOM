<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title"><center>DETAIL LAPORAN</center></h4>
    <div class="row">
      <div class="col-md-12">
      <div class="box-body">
        <div class="row js-modal-body">
        </div>
      </div>
      </div>
    </div>
  </div>
  <div class="modal-body" id="content-placeholder">

  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Tutup</button>
  </div>
</div>

<script>
$(document).ready(() => {
  $("#LaporanTable").on("click",".js-detail-laporan",function(){
    var button=this;
    var tr=$(button.closest("tr")).get();
    let dataLaporan = $(tr[0]).data('laporan');
    let dataDenda = $(tr[0]).data('denda');
    let bodyHtml = `
    <table class="table" width="100%">
      <tr>
        <td width="24%"><b>Kontrak Kehadiran DC</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataLaporan.KehadiranDC}</td>
        <td width="24%"><b>Realisasi Kehadiran DC</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataLaporan.RealisasiKehadiranDC}</td>
      </tr>
      <tr>
        <td width="24%"><b>Kontrak Kehadiran DRC</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataLaporan.KehadiranDRC}</td>
        <td width="24%"><b>Realisasi Kehadiran DRC</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataLaporan.RealisasiKehadiranDRC}</td>
      </tr>
      <tr>
        <td width="24%"><b>Denda DC</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataDenda.DendaDC}</td>
        <td width="24%"><b>Denda DRC</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataDenda.DendaDRC}</td>
      </tr>
      <tr>
        <td width="24%"><b>Response Time</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataLaporan.ResponseTime}</td>
        <td width="24%"><b>Problem Solving</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataLaporan.ProblemSolving}</td>
      </tr>
      <tr>
        <td width="24%"><b>Suku Cadang</b></td>
        <td width="1%">:</td>
        <td width="24%">${dataLaporan.SukuCadang}</td>
      </tr>
    </table>
    `;
    $('.js-modal-body').html(bodyHtml);
    $(".js-modal-detail").modal("show");
  });
})

</script>
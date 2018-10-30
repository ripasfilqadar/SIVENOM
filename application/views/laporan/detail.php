<div class="modal-content">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">Detail Laporan</h4>
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
    <h6>Response Time: ${dataLaporan.ResponseTime} </h6>
    <h6>Problem Solving: ${dataLaporan.ProblemSolving} </h6>
    <h6>Suku Cadang: ${dataLaporan.SukuCadang} </h6>
    <h6>Denda DC: ${dataDenda.DendaDC} </h6>
    <h6>Denda DRC: ${dataDenda.DendaDRC} </h6>

    `;
    $('.js-modal-body').html(bodyHtml);
    $(".js-modal-detail").modal("show");
  });
})

</script>
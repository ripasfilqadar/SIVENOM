<script src="<?= base_url('assets/'); ?>dist/js/handlebars-v4.0.11.js"></script>
<script type="text/javascript">
  <?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
  <?php }else if($this->session->flashdata('error')){  ?>
      toastr.error("<?php echo $this->session->flashdata('error'); ?>");
  <?php } ?>
</script>
<!-- Modal -->
<div class="modal fade" id="modal-st">
  <div class="modal-dialog modal-lg">
    <form id="myform" method="POST" role="form" action=<?= site_url('Surat/simpan');?> enctype="multipart/form-data" autocomplete="off">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Form Penyimpanan Surat Tugas</h4>
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
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Template Modal  -->
<script id="modal-st-template" type="text/x-handlebars-template">
  <div class="row">
    
    <div class="col-md-12">
      <div class="box box-danger">
        <!-- form start -->
        <div class="box-body">
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label >No.Surat Tugas</label>
                <input type="hidden" class="form-control" name="MASTER[ID]" placeholder="" value="{{ID}}">
                <input type="text" class="form-control" name="MASTER[NO_ST]" placeholder="" value="{{NO_ST}}">
              </div>
              <div class="form-group">
                <label >Tgl.Mulai Dinas</label>
                <input type="text" class="form-control" id="tgl_mulai" name="MASTER[TGL_MULAI]" placeholder="" value="{{TGL_MULAI}}">
              </div>
              <div class="form-group">
                <label >Tgl.Selesai Dinas</label>
                <input type="text" class="form-control" id="tgl_selesai" name="MASTER[TGL_SELESAI]" placeholder="" value="{{TGL_SELESAI}}">
              </div>
              <div class="form-group">
                <label >Hasil Scan ST</label>
                <input type="file" class="form-control" name="FILE_ST" placeholder="" value="">
              </div>            
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label >Kota Asal</label>
                <input type="text" class="form-control" name="MASTER[KOTA_ASAL]" placeholder="" value="{{TGL_SELESAI}}">
              </div>
              <div class="form-group">
                <label >Kota Tujuan</label>
                <input type="text" class="form-control" name="MASTER[KOTA_TUJUAN]" placeholder="" value="{{TGL_SELESAI}}">
              </div>
              <div class="form-group">
                <label >Perihal</label>
                <textarea rows="5" class="form-control" name="MASTER[PERIHAL]">{{PERIHAL}}</textarea>
              </div>
            </div>
<!--             <div class="col-md-6">
              <div class="form-group">
                <label >No.Laporan Pelaksanaan Tugas</label>
                <input type="hidden" class="form-control" name="MASTER[ID]" placeholder="" value="{{ID}}">
                <input type="text" class="form-control" name="MASTER[NO_ST]" placeholder="" value="{{NO_ST}}">
              </div>
              <div class="form-group">
                <label >Tgl.Laporan Pelaksanaan Tugas</label>
                <input type="text" class="form-control" name="MASTER[TGL_ST]" placeholder="" value="{{TGL_ST}}">
              </div>
              <div class="form-group">
                <label >Hasil Scan Laporan Pelaksanaan Tugas</label>
                <input type="file" class="form-control" name="FILE_ST" placeholder="" value="">
              </div>            
            </div> -->
            </div>
            <hr>
            <div class="row">
              <div class="col-md-4">
                <input type="text" class="form-control" id="nip" placeholder="NIP">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" id="nama" placeholder="Nama">
              </div>
              <div class="col-md-4">
                <input type="text" class="form-control" id="jabatan" placeholder="Jabatan">
              </div>
            </div>
            </br>
            <div class="row">              
              <div class="col-md-12">
                <button type="button" class="btn btn-success" id="add-row" style="float:right;margin-bottom: 10px"><i class="fa fa-plus"></i></button>    
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 table-responsive">
                <table class="table" id="tableTambahan">
                  <thead>
                  <tr>
                    <th><p style="color: red;">X</p></th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                  </tr>
                  </thead>
                  <tbody id="tbodyTambahan">
                  </tbody>
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4">
                <button type="button" class="btn btn-danger" id="delete-row"><i class="fa fa-trash"></i> Hapus</button>    
              </div>
            </div>
              
            
            

        </div>
        <!-- /.box-body -->
      </div>
    <!-- /.box -->
    </div>
  </div>
</script>
<!-- Template Detail  -->
<script id="detail-template" type="text/x-handlebars-template">
  <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
  <p class="text-muted">
    B.S. in Computer Science from the University of Tennessee at Knoxville
  </p>

  <hr>

  <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
  <p class="text-muted">Malibu, California</p>

  <hr>

  <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
  <p>
    <span class="label label-danger">UI Design</span>
    <span class="label label-success">Coding</span>
    <span class="label label-info">Javascript</span>
    <span class="label label-warning">PHP</span>
    <span class="label label-primary">Node.js</span>
  </p>

  <hr>

  <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
</script>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Inventarisasi
            <small>Surat Tugas</small>
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Daftar Surat Tugas</h3>
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
                <div class="col-md-6">
                  <div class="form-group" >
                        <input type="text" class="form-control" id="tgl_st" placeholder="Tanggal ">
                  </div>
                </div>                
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div style="float: right;margin-bottom: 10px">
                    <a class="btn btn-sm btn-info btn-flat pull-right open-modal-st" data-toggle="modal" data-target="#modal-st"><i class="fa fa-plus"></i></a>
                  </div>
                  <table id="tSortable" class="table table-bordered table-hover jambo_table" cellspacing="0" width="100%">
                    <thead>
                      <tr>
                          <th width="25%">No.Surat Tugas</th>
                          <th width="20%">Tgl.Mulai Dinas</th>
                          <th width="20%">Tgl.Selesai Dinas</th>
                          <th width="25%">Keterangan Dinas</th>
                          <th width="10%">Aksi</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
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
$(function () {
  var role_id =<?= $_SESSION['role']; ?>;
  var cari="";
  var tgl_st="";
  $("#cari").keyup(function(){
      cari=$("#cari").val();
      load_table();
  })
  $('#tgl_st').daterangepicker({
    singleDatePicker: true,
    singleClasses: "picker_1",
    locale: {
      format: 'DD-MM-YYYY'
    },
  }, function(start, end, label) {
      tgl_st=moment(start.toISOString()).format("YYYY-MM-DD");
      load_table();
  });
  Handlebars.registerHelper('ifCond', function(v1, v2, options) {
      if(v1 >= v2) {
        return options.fn(this);
      }
      return options.inverse(this);
  });
  Handlebars.registerHelper('ifEquals', function(v1, v2, options) {
      if(v1 == v2) {
        return options.fn(this);
      }
      return options.inverse(this);
  });

  Handlebars.registerHelper('for', function(n, block) {
      var accum = '';
      for(var i = 0; i < n; ++i)
          accum += block.fn(i);
      return accum;
  });
  var detail=null;
  
  
  $(document).on("click", ".open-modal-st", function () {

    var ID = $(this).data('id');
    
    var data="";
    $('#modal-st').modal('show');
    // Grab the template script
    var theTemplateScript = $("#modal-st-template").html();

    // Compile the template
    var theTemplate = Handlebars.compile(theTemplateScript);
    $.get("<?=site_url('Surat/getDataModal'); ?>",{ ID:ID }, function(data){
      var theCompiledHtml = theTemplate(data);
      // Add the compiled html to the page
      $('#content-placeholder').html(theCompiledHtml);      
    $("#add-row").click(function(){

      var nip = $("#nip").val();
      var nama = $("#nama").val();
      var jabatan = $("#jabatan").val();
      if(nip != '' && nama != '' && jabatan != ''){
        var markup =  "<tr>"+
                      "<td><input type='checkbox' name='record'></td>"+
                      "<td>" + nip + " <input type='hidden' value='"+nip+"' name='DETAIL[NIP][]'></td>"+
                      "<td>" + nama + "<input type='hidden' value='"+nama+"' name='DETAIL[NAMA][]'></td>"+
                      "<td>" + jabatan + "<input type='hidden' value='"+jabatan+"' name='DETAIL[JABATAN][]'></td>"+
                      "</tr>";
        $("#tableTambahan #tbodyTambahan").append(markup);
        $("#nip").val('')
        $("#nama").val('')
        $("#jabatan").val('');
      }else alert('Nip , Nama dan Jabatan Harus Diisi !!');
    });
        
    // Find and remove selected table rows
    $("#delete-row").click(function(){
        $("#tableTambahan #tbodyTambahan").find('input[name="record"]').each(function(){
          if($(this).is(":checked")){
                $(this).parents("tr").remove();
            }
        });
    });
    $('#tgl_mulai').daterangepicker({
      singleDatePicker: true,
      singleClasses: "picker_1",
      locale: {
        format: 'YYYY-MM-DD'
      }
    });
    $('#tgl_selesai').daterangepicker({
      singleDatePicker: true,
      singleClasses: "picker_1",
      locale: {
        format: 'YYYY-MM-DD'
      }
    });

    })
  });     

  var table=null;
  var links     = init_links();
  $(document).ready(function(){
    load_table();      
    
  });
    
  function load_table(){
    if (table) {
      table.destroy();
    }
      
    var columns = [];
      
    var n = links['columns'].length;
     for (var i = 0; i < n; i++) {
        columns.push({ data : links['columns'][i].fieldname });
    }


    table = $('#tSortable').DataTable({
            "searching"     : false,
            "ordering"      : false,
            "paging"        :true,
            "info"          :true,
            "scrollX"       : true,
            "columns"       : links['columns'],
            "aLengthMenu"    : [
                [5, 10, 25, 50, 75,99999], // Key
                [5, 10, 25, 50, 75,'ALL']  // Value
            ],
            "iDisplayLength": 5,
            "bProcessing"   : true,
            "bServerSide"   : true,
            "fnServerData"  : function ( _source, _data, _callback, _settings ) {
                $.ajax({
                    "type" : "POST",
                    "url"  : links['url'],
                    "data" : {
                        // orderBy  : _data[1].value[_data[2].value[0].column].data,
                        // orderDir : _data[2].value[0].dir,
                        start    : _data[3].value,
                        length   : _data[4].value,
                        search   : _data[5].value.value,
                        cari     : cari,
                        tgl_st   : tgl_st
                    }
                }).done(function(response) {
                    _callback(response);
                });
            } 
    });     
  }
  
  function init_links(){
    var links={
        'url'       : 'Surat/getData',
        'columns'   :  [{
                        "data"  :"NO_ST",
                        "mData" :"NO_ST"
                        },{
                        "data"  :"TGL_MULAI",
                        "mData" :"TGL_MULAI"
                        },{
                        "data"  :"TGL_SELESAI",
                        "mData" :"TGL_SELESAI"
                        },{
                        "data"  :"PERIHAL",
                        "mData" :"PERIHAL"
                        },{
                        "mData": null,
                        "bSortable": false,
                        "mRender": function(data, type, full) {
                            let detail='<a class="aksi" data-id='+full["ID"]+'><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a>';       
                            let edit='<a class="edit open-modal-st" data-toggle="modal" data-target="#modal-st" data-id='+full["ID"]+'><i class="fa fa-pencil fa-2x" aria-hidden="true"></i></a>';
                            return detail+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'+edit;
                        }}],
    }
    return links;
  }
  setTimeout(
  function() 
  {
    $(".aksi").click(function(){
      var ID = $(this).data('id');
      $("#st-detail").show();
      // Grab the template script
      var theTemplateScript = $("#detail-template").html();
      // Compile the template
      var theTemplate = Handlebars.compile(theTemplateScript);
      $.get("<?=site_url('Surat/getDataDetail'); ?>",{ ID:ID }, function(data){
        var theCompiledHtml = theTemplate(data);
        // Add the compiled html to the page
        $('#body-detail').html(theCompiledHtml);      
      })
      
    })
  }, 1000);
  
  
}); 
</script>
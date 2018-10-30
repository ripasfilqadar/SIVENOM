
<!-- /.modal -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Vendor
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
          <?php $this->view('vendor/form');?>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
<script>
(document).ready(function() {
  var data = <?php echo json_encode($data); ?>;
    $('#tSordatatabletable').DataTable();
} );

</script>
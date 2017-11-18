<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Default box -->
<div class="box">
  <div class="box-body">
    <a href="<?=base_url('admin/distributorgroup/add')?>" type="button" class="btn btn-primary">Tambah</a>
    <br><br>
    <div class="table-responsive">
      <table class="table table-bordered table-striped table-hover datatable">
        <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Persentasi Jual</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- DataTables -->
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?=base_url()?>assets/js/global.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
      return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
      };
    };

    var t = $(".datatable").dataTable({
      initComplete: function() {
        var api = this.api();
        $('.dataTable input')
        .off('.DT')
        .on('keyup.DT', function(e) {
          if (e.keyCode == 13) {
            api.search(this.value).draw();
          }
        });
      },
      oLanguage: {
        sProcessing: "Loading..."
      },
      processing: true,
      serverSide: true,
      ajax: {"url": base_url("api/v1/level/datatable"), "type": "POST"},
      columns: [
      {
        "data": "uid",
        "orderable": false
      },
      {"data": "nama"},
      {"data": "persentasi_jual"},
      {
        "data": "action",
        "orderable":false
      }
      ],
      order: [[1, 'asc']],
      rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        var index = page * length + (iDisplayIndex + 1);
        $('td:eq(0)', row).html(index);
      }
    });
  });
</script>

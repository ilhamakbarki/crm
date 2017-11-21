<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Default box -->
<div class="box box-primary">
  <div class="box-body">
    <div class="table-responsive">
      <table class="table table-hover table-striped width-full datatable" data-plugin="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Harga per satuan</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
</div>
<!-- DataTables -->
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/js/global.js')?>"></script>
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
      ajax: {"url": base_url()+"/distributor/item/datatable", "type": "POST"},
      columns: [
      {
        "data": "kode",
        "orderable": false
      },
      {"data": "kode"},
      {"data": "nama"},
      {"data": "stok"},
      {"data": "satuan"},
      {"data": "harga"}
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
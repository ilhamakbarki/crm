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
    ajax: {"url": base_url()+"/api/v1/item/datatable", "type": "POST"},
    columns: [
    {
      "data": "uid",
      "orderable": false
    },
    {"data": "kode"},
    {"data": "nama"},
    {"data": "satuan"},
    {"data": "stok"},
    {"data": "beli"},
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
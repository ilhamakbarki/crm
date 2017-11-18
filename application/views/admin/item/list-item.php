<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Default box -->
<div class="box box-primary">
  <div class="box-body">
    <a href="<?=base_url('admin/item/add')?>" type="button" class="btn btn-primary">Tambah</a>
    <br><br>
    <div class="table-responsive">
      <table class="table table-hover table-striped width-full datatable" data-plugin="dataTable">
        <thead>
          <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Stok</th>
            <th>Beli</th>
            <th>Aksi</th>
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
<script type="text/javascript" src="<?=base_url('assets/js/admin/item/list.js')?>"></script>
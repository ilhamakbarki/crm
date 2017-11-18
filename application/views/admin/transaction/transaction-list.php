<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

<!-- Default box -->
<div class="box">
  <div class="box-body">
    <a type="button" href="<?=base_url('admin/transaction/add')?>" class="btn btn-primary pull">Tambah Invoice</a>
    <br><br>
    <div class="table-responsive">
      <table class="table table-hover table-bordered table-striped datatable">
        <thead>
          <tr>
            <th>No</th>
            <th>No Invoice</th>
            <th>Tanggal</th>
            <th>Distributor</th>
            <th>Detail</th>
          </tr>
        </thead>
        <tbody>
          <?php for ($i=1; $i <= 20; $i++) { ?>
          <tr>
            <td><?=$i?></td>
            <td>T<?=rand(100000,999999)?></td>
            <td>
              <?php 
              $timestamp = mt_rand($i, time());
              echo date("d M Y", $timestamp);
              ?>
            </td>
            <td>D<?=rand(1000,9999)?></td>
            <td>
              <a type="button" href="<?=base_url('admin/transaction/detail').'/'.$i?>" class="btn btn-sm btn-success">Detail</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<!-- DataTables -->
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">$('.datatable').DataTable();</script>

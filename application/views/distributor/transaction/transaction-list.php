<!-- DataTables -->
<link rel="stylesheet" href="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Default box -->
<div class="box box-success">
  <div class="box-body">
    <table class="table table-bordered table-striped datatable">
      <thead>
        <tr>
          <th>No</th>
          <th>No Transaksi</th>
          <th>Tanggal</th>
          <th>Biaya</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php for ($i=1; $i <=20 ; $i++) { ?>
        <tr>
          <td><?=$i?></td>
          <td><?php $in="T".rand(10000000, 99999999); echo $in;?></td>
          <td>
            <?php 
            $timestamp = mt_rand($i, time());
            echo date("d M Y", $timestamp);
            ?>
          </td>
          <td align="right">Rp. <?=number_format(rand(10000000, 15000000))?></td>
          <td><center><a href="<?=base_url('distributor/transaction/transactiond/').$in?>" class="btn btn-default btn-detail">Detail</a></center></td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
<!-- DataTables -->
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/lte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/js/distributor/transaction/transaction-list.js')?>"></script>
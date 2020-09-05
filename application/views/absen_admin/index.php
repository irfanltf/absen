



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          	

          <div class="row">
          	
          	<div class="col-lg-12">
          		<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>

          		<?php echo $this->session->flashdata('message'); ?>

          		
          	<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Jam Absen</th>
			      <th scope="col">Jadwal</th>
			      <th scope="col">Keterlambatan</th>
            <th scope="col">Lokasi</th>
    
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			  	<?php foreach ($absen as $m) { ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $m['nama']; ?></td>
            <td><?php echo date('d - m -  Y ', strtotime( $m['jam_absen'])); ?></td>
            <td><?php echo date('H:i ', strtotime( $m['jam_absen'])); ?></td>
			      <td><?php echo date('H:i ', strtotime( $m['jam_jadwal'])); ?></td>
			      <td><?php echo $m['lokasi']; ?></td>
			      
			      <td>
<?php   

$date1 = strtotime( $m['jam_absen']);
$date2 = strtotime($m['jam_jadwal']);
;
$interval = $date1 - $date2;
$seconds = $interval % 60;
$minutes = floor(($interval % 3600) / 60);
$hours = floor($interval / 3600);
echo $hours." jam ".$minutes. 'menit';

?>


              
			      	
			  </td>
			      
			    </tr>
			    <?php $i++; ?>
			<?php } ?>
			  </tbody>
			</table>


          	</div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->





    

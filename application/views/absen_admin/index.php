



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
			      <th scope="col">#</th>
			      <th scope="col">Tanggal</th>
			      <th scope="col">Lokasi</th>
			      <th scope="col">Nama Pekerjaan</th>
			      <th scope="col">Status</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			  	<?php foreach ($absen as $m) { ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $m['tanggal']; ?></td>
			      <td><a href="<?= base_url('absen_admin/peta/') ?><?php echo $m['id_absensi']  ?>" target="__blank"><?php echo $m['lokasi']; ?></a></td>
			      <td><?php echo $m['pekerjaan']; ?></td>
			      <td>
			      	<span href="" class="badge <?php if($m['status'] == 'selesai'){ echo 'badge-success';}else{echo 'badge-warning';} ?>">

			      <?php echo $m['status']; ?>
			      	
			      </span>
			  </td>
			  <td>
			      	<a href="<?php echo base_url('absen_admin/acc'); ?>/<?php echo $m['id_absensi'] ?>" class="badge badge-pill badge-success" onclick="return confirm('Yakin?');">Accept</a> |
			      	<a href="<?php echo base_url('absen_admin/del'); ?>/<?php echo $m['id_absensi'] ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin?');">Delete</a>

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





    





        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          	

          <div class="row">
          	
          	<div class="col-lg-12">
          		<?= form_error('role', '<div class="alert alert-danger" role="alert">','</div>'); ?>

          		<?php echo $this->session->flashdata('message'); ?>

          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newrolemodal">Add New Akun</a>
          	<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">Tanggal Lahir</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Role</th>
            <th scope="col">Aktif</th>
			
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			  	<?php foreach ($usr as $r) { ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $r['name']; ?></td>
            <td><?php echo $r['email']; ?></td>
            <td><?php echo $r['tgl_lahir']; ?></td>
            <td><?php echo $r['jabatan']; ?></td>
            <td><?php echo $r['role']; ?></td>
			      <td>
              <?php if ($r['is_active'] == 1): ?>
                <span class="badge badge-success">Active</span>
                <?php else: ?>
                <span class="badge badge-success">Non Aktif</span>
              <?php endif ?>
              
                
              </td>
			      <td>

			      	<a href="<?php echo base_url('admin/edit/').$r['id']; ?>" class="badge badge-pill badge-success">Edit</a> |
			      	<a href="<?php echo base_url('admin/del/').$r['id']; ?>" class="badge badge-pill badge-danger">Delete</a>

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





    
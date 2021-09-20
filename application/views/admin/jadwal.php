



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          	

          <div class="row">
          	
          	<div class="col-lg-12">
          		<?= form_error('role', '<div class="alert alert-danger" role="alert">','</div>'); ?>

          		<?php echo $this->session->flashdata('message'); ?>

          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newrolemodal">Tambah Jadwal Baru</a>
          	<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">No</th>
            <th scope="col">Waktu Masuk</th>
            <th scope="col">Waktu Pulang</th>
            <th scope="col">Status</th>
			      <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			  	<?php foreach ($waktu as $r) { ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
            <td><?php echo $r['waktu']; ?></td>
            <td><?php echo $r['waktu_pulang']; ?></td>
            <td><?php echo $r['status']; ?></td>
           
			      <td>

			      	<a href="<?php echo base_url('admin/editjadwal/').$r['id']; ?>" class="badge badge-pill badge-success"><i class="fas fa-cog"></i> Edit</a> 
			      	<a href="<?php echo base_url('admin/deljadwal/').$r['id']; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin?');">Delete</a>

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




<!-- Modal -->
<div class="modal fade" id="newrolemodal" tabindex="-1" role="dialog" aria-labelledby="newrolemodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newrolemodal">Add New Role</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('admin/add_jadwal'); ?>" method="post">
      <div class="modal-body">
     <div class="form-group">
                  <input type="time" class="form-control form-control-user" id="waktu" placeholder="waktu masuk" name="waktu" >
                  <small class="text-danger"><?php echo form_error('waktu'); ?></small>
                </div>

                <div class="form-group">
                  <input type="time" class="form-control form-control-user" id="waktu_pulang" placeholder="waktu pulang" name="waktu_pulang" >
                  <small class="text-danger"><?php echo form_error('waktu_pulang'); ?></small>
                </div>             


      <div class="modal-footer">
        <a href="" class="btn btn-secondary" data-dismiss="modal">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
              <hr>
  
          </div>
  </div>
</div>
    
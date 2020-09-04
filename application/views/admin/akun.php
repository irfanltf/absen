



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
              <?php if ($r['is_active'] == 1 AND $r['jabatan'] != '-'): ?>
                <span class="badge badge-info">Active</span>
                <?php else: ?>
                <span class="badge badge-dark">Non Aktif</span>
              <?php endif ?>
              
                
              </td>
			      <td>

			      	<a href="<?php echo base_url('admin/edit/').$r['id']; ?>" class="badge badge-pill badge-success">Edit</a> |
			      	<a href="<?php echo base_url('admin/del/').$r['id']; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Yakin?');">Delete</a>

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
      <form action="<?php echo base_url('admin/add_run'); ?>" method="post">
      <div class="modal-body">
     <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" placeholder="Nama" name="name" >
                  <small class="text-danger"><?php echo form_error('name'); ?></small>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Email" name="email" >
                  <small class="text-danger"><?php echo form_error('email'); ?></small>
                </div>
                 <div class="form-group">
                  <label>Tanggal lahir</label>
                  <input type="date" class="form-control form-control-user" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir">
                  <small class="text-danger"><?php echo form_error('tgl_lahir'); ?></small>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1" >
                    <small class="text-danger"><?php echo form_error('password1'); ?></small>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2" >
                  </div>
      </div>
       <div class="form-group mg-t-30 col-6">
                                                <label for="exampleFormControlSelect1">Pilih Jabatan</label>
                                                <select name="jabatan" class="form-control" required="">
                                                  <option value="">--Pilih Jabatan--</option>
                                                    
                                                  <option value="System Enginer" >System Enginer</option>
                                                  <option value="Network Enginer">Network Enginer</option>
                                                  <option value="Network Security">Network Security</option>
                                                      
                                                </select>
                                                             
                                                        </div>
                  <div class="form-group mg-t-30 col-6">
                                                <label for="exampleFormControlSelect1">Pilih Role</label>
                                                <select name="role_id" class="form-control" required="">
                                             
                                                  <option value="">--Pilih Role--</option>
                                                  <option value="2" >Karyawan</option>
                                                  <option value="3 Enginer">Pimpinan</option>
                                                  
                                                </select>
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
    
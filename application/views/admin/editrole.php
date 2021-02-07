



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          	

          <div class="row">
          	
          	<div class="col-lg-6">
          		<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newrolemodal">Add New Role</h5>
        
      </div>
      <form action="<?php echo base_url('admin/editrole_save'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
      <input type="hidden" class="form-control" id="id" name="id" placeholder="Role Name" value="<?= $role->id ?>">
      <input type="text" class="form-control" id="role" name="role" placeholder="Role Name" value="<?= $role->role ?>">
    </div>
      </div>

      <div class="modal-footer">

        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
    </div>



          	</div>
          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->



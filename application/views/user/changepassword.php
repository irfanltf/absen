



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          <div class="row">
          	<div class="col-lg-6">
          		<?php echo $this->session->flashdata('message'); ?> 
          		<form action="<?php base_url('user/changepassword'); ?>" method="post">
          			 <div class="form-group">
					    <label for="currentpassword">Current Password</label>
					    <input type="Password" class="form-control" id="currentpassword" name="currentpassword">
					   <?php echo form_error('currentpassword', '<small class="text-danger pl-3">', '</small>'); ?>
					 </div>
					 <div class="form-group">
					    <label for="newpassword1">New Password</label>
					    <input type="Password" class="form-control" id="newpassword1" name="newpassword1">
					    <?php echo form_error('newpassword1', '<small class="text-danger pl-3">', '</small>'); ?>
					 </div>
					 <div class="form-group">
					    <label for="newpassword2">Repeat Password</label>
					    <input type="Password" class="form-control" id="newpassword2" name="newpassword2">
					    <?php echo form_error('newpassword2', '<small class="text-danger pl-3">', '</small>'); ?>
					 </div>
					 <div class="form-group">
					   <button type="submit" class="btn btn-dark" >Change Password</button>
					 </div>
          		</form>
          	</div>

          </div>


        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

    
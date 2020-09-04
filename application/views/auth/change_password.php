

  <div class="container">

    <!-- Outer Row haha aku kamu asd-->
    <div class="row justify-content-center">

      <div class="col-lg-7">

        <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: #B22222">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
         
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 ">Change Your Password for</h1><h5 class="mb-4"><?php echo $this->session->userdata('reset_email'); ?></h5>
                  </div>
                  <?php echo $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?php echo  base_url('auth/changepassword'); ?>">
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password1" placeholder="Enter New password" name="password1">
                      <small class="text-danger"><?php echo form_error('password1'); ?></small>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat password" name="password2">
                      <small class="text-danger"><?php echo form_error('password2'); ?></small>
                    </div>

                    <button type="submit" class="btn btn-dark btn-user btn-block">
                      Change Password
                    </button>
                
                  </form>
                  <hr>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  
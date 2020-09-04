

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
                    <h1 class="h4 text-light-900 mb-4">Forgot Your Password?</h1>
                  </div>
                  <?php echo $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?php echo  base_url('auth/forgotpassword'); ?>">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" placeholder="Enter Email Address..." name="email"  value="<?= set_value('email'); ?>">
                      <small class="text-danger"><?php echo form_error('email'); ?></small>
                    </div>

                    <button type="submit" class="btn btn-light btn-user btn-block">
                      Reset Password
                    </button>
                
                  </form>
                  <hr>

                  <div class="text-center">
                    <a class="small" href="<?php echo base_url(); ?>auth">Back to login</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  
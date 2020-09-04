  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-8 mx-auto" style="background-color: #B22222">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          
                 <div class="col-lg-4 d-none d-lg-block bg-login-image">
              </div>
          <div class="col-lg">
            <div class="p-3">
              <div class="text-center">
                <h1 class="h4 text-light-900 mb-4 mt-4">Create an Account!</h1>
              </div>
              <form class="user" method="post" action="<?php echo base_url ('auth/registration'); ?>">
                 <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="text" placeholder="Full name" name="name" value="<?= set_value('name'); ?>"
                  <small class="text-danger"><?php echo form_error('name'); ?></small>

                </div>

                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" placeholder="Email" name="email" value="<?= set_value('email'); ?>">
                  <small class="text-danger"><?php echo form_error('email'); ?></small>
                </div>
                 <div class="form-group">
                  <label>Tanggal lahir</label>
                  <input type="date" class="form-control form-control-user" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?= set_value('tgl_lahir'); ?>">
                  <small class="text-danger"><?php echo form_error('tgl_lahir'); ?></small>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                    <small class="text-danger"><?php echo form_error('password1'); ?></small>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" placeholder="Repeat Password" name="password2">
                  </div>
                </div>
                <button type="submit" class="btn btn-dark btn-user btn-block">
                  Register Account
                </button>

              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?php echo base_url('auth/forgotpassword'); ?>">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a class="small" href="<?php echo base_url(); ?>auth">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

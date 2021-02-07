  <div class="login-box">
  
  <!-- /.login-logo -->
  <div class="card">
    <center><?php echo $this->session->flashdata('message');?></center></div>
    <div class="card-body login-card-body">
      <p class="login-box-msg">PT. SYSWARE INDONESIA</p>

      <form class="user" method="post" action="<?php echo  base_url('auth'); ?>">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"> <small class="text-danger"><?php echo form_error('email'); ?></small></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="password" name="password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"><small class="text-danger"><?php echo form_error('password'); ?></small></span>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->





    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url('Profile')?>" class="brand-link">
      
      <span class="brand-text font-weight-light"><center><b><?php echo strtoupper($this->session->userdata('nama'));  ?></b></center></span>
    </a>






    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column"  data-accordion="false">



          <!-- Query dari menu -->
<?php 
  $role_id = $this->session->userdata('role_id');
  $QueryMenu = "
                SELECT `user_menu`.`id`, `menu`
                FROM `user_menu` JOIN `user_access_menu`
                ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                WHERE `user_access_menu`.`role_id` = $role_id
                ORDER BY `user_access_menu`.`menu_id` ASC


  ";

  $menu = $this->db->query($QueryMenu)->result_array();



 ?>

 <!-- looping menu-->



  <?php foreach ($menu as $m) { ?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
             
              <p>
                <?php echo $m['menu']; ?>
                
              </p>
            </a>
            <ul class="nav nav-treeview">
               <!-- Siapkan Sub Menu sesuai menu-->

           <?php 
           $menuId = $m['id'];
              $QuerySubMenu = "
                SELECT *
                          FROM `user_sub_menu` JOIN `user_menu`
                          ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                          WHERE `user_sub_menu`.`menu_id` = $menuId
                          AND `user_sub_menu`.`is_active` = 1
              ";
          $subMenu = $this->db->query($QuerySubMenu)->result_array();

            ?>

      <?php foreach ($subMenu as $sm) {  ?>
              <li class="nav-item">
        <?php if($title ==  $sm['title']) : ?>
<a href="<?php echo  base_url($sm['url']); ?>" class="nav-link active">
 <?php else : ?>
<a href="<?php echo  base_url($sm['url']); ?>" class="nav-link">
   <?php endif; ?>

                <!-- <a href="<?php echo  base_url($sm['url']); ?>" class="nav-link"> -->


                  <i class="<?php echo $sm['icon']; ?>"></i>
                  <span><?php echo  $sm['title']; ?></span>
                </a>
              </li>
              <?php } ?>
              
            </ul>
          </li>

<?php } ?>

        </ul> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Sistem Informasi Kepegawaian</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('Dashboard')?>">Dashboard</a></li>
              <li class="breadcrumb-item active">Data Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

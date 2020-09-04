

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          	

          <div class="row">
          	
          	<div class="col-lg">
              <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                  
                  <?php echo validation_errors(); ?>

                </div>
              <?php endif; ?>

          		<?php echo $this->session->flashdata('message'); ?>

          		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newsubmenumodal">Add New Sub Menu</a>
          	<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Title</th>
			      <th scope="col">Menu</th>
             <th scope="col">Url</th>
              <th scope="col">Icon</th>
               <th scope="col">Active</th>
                <th scope="col">Action</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			  	<?php foreach ($subMenu as $sm) { ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $sm['title']; ?></td>
            <td><?php echo $sm['menu']; ?></td>
            <td><?php echo $sm['url']; ?></td>
            <td><?php echo $sm['icon']; ?></td>
            <td><?php echo $sm['is_active']; ?></td>
			      <td>
			      	<a href="<?php echo base_url('menu/submenu_edit/') ?><?php echo $sm['id'] ?>" class="badge badge-pill badge-success">Edit</a> |
              <a href="<?php echo base_url('menu/submenu_delete/') ?><?php echo $sm['id'] ?>" class="badge badge-pill badge-danger" onclick="return confirm('Are you sure?');">Delete</a>

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
<div class="modal fade" id="newsubmenumodal" tabindex="-1" role="dialog" aria-labelledby="newsubmenumodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newsubmenumodal">Add Sub New Menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('menu/submenu'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
	       <input type="text" class="form-control" id="title" name="title" placeholder="Title Submenu">
	     </div>
       <div class="form-group">
         <select name="menu_id" id="menu_id" class="form-control">
           <option value="">Select Menu</option>
           <?php foreach ($menu as $m) { ?>
              <option value="<?php echo $m['id']; ?>"><?php echo $m['menu']; ?></option>
           <?php } ?>
         </select>
       </div>
       <div class="form-group">
         <input type="text" class="form-control" id="url" name="url" placeholder="url Submenu">
       </div>
       <div class="form-group">
         <input type="text" class="form-control" id="icon" name="icon" placeholder="icon Submenu">
       </div>
       <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked="">
          <label class="form-check-label" for="is_active">
            Active?
          </label>
        </div>
       </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
       </form>
    </div>
  </div>
</div>
    
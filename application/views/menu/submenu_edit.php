<div class="row">
	<div class="col">
		<form action="<?php echo base_url('menu/submenu_edit_run'); ?>" method="post">
 <div class="modal-body">
			<div class="form-group">
         <select name="menu_id" id="menu_id" class="form-control">
           <option value="">Select Menu</option>
           <?php foreach ($m as $mm) { ?>
           	<?php if ($menu['menu_id'] == $mm['id']): ?>
              <option value="<?php echo $mm['id']; ?>" selected><?php echo $mm['menu']; ?></option>
           		<?php else: ?>
              <option value="<?php echo $mm['id']; ?>"><?php echo $mm['menu']; ?></option>

           	<?php endif ?>
           <?php } ?>
         </select>
       </div>
       </div>
      <div class="modal-body">
        <div class="form-group">
	    <input type="hidden" class="form-control" id="menu" name="id" placeholder="Menu Name" value="<?php echo $menu['id']; ?>">
	    <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $menu['title']; ?>">
	  </div>
      </div>


      <div class="modal-body">
        <div class="form-group">
	    <input type="text" class="form-control" id="url" name="url" placeholder="url" value="<?php echo $menu['url']; ?>">
	  </div>
      </div>

      <div class="modal-body">
        <div class="form-group">
	    <input type="text" class="form-control" id="icon" name="icon" placeholder="icon" value="<?php echo $menu['icon']; ?>">
	  </div>
      </div>

            <div class="modal-body">
        <div class="form-group">
	    <input type="text" class="form-control" id="is_active" name="is_active" placeholder="Aktif?" value="<?php echo $menu['is_active']; ?>">
	  </div>
      </div>

      <div class="modal-footer">
        <a href="<?= base_url('menu/submenu') ?>" class="btn btn-secondary" data-dismiss="modal">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
	</div>
</div>
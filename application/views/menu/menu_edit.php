<div class="row">
	<div class="col">
		<form action="<?php echo base_url('menu/menu_edit_run'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
	    <input type="hidden" class="form-control" id="menu" name="id" placeholder="Menu Name" value="<?php echo $menu['id']; ?>">
	    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu Name" value="<?php echo $menu['menu']; ?>">
	  </div>
      </div>

      <div class="modal-footer">
        <a href="<?= base_url('menu') ?>" class="btn btn-secondary" data-dismiss="modal">Batal</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
	</div>
</div>
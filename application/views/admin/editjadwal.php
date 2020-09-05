
      <div class="modal-header">
        <h5 class="modal-title" id="newrolemodal">Update Jadwal</h5>
      
      
      </div>
      <form action="<?php echo base_url('admin/update_jadwal'); ?>" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-6">
     <div class="form-group">
                  <input type="time" class="form-control form-control-user" id="name" placeholder="Nama" name="waktu" value="<?php echo $waktu['waktu'] ?>">
                  <input type="hidden" class="form-control form-control-user" id="name" placeholder="Nama" name="id" value="<?php echo $waktu['id'] ?>">
     </div>
            
          </div>
        </div>
             
         


   

      <div class="modal-footer">
        <a href="" class="btn btn-dark" data-dismiss="modal">Batal</a>
        <button type="submit" class="btn btn-success">Simpan</button>
      </div>
       </form>
              <hr>
  
      
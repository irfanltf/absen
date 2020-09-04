        
            <section>
                <div class="section__content section__content--p30 m-t-45">
                    <div class="container-fluid">
          
                    <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="post-user-profile-awrap shadow-reset">
                                <div class="user-profile-post">
                                   
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                           <div class="card">
                                                      <div class="card-header">
                                                    <h4>Laporan</h4> 
                                                      </div>
                                                      <div class="card-body">
                                                      <form target="_blank" action="<?php echo base_url('laporan/cari'); ?>" method="post">
                                                            <hr>
                                                       <h4> Lihat Laporan Berdasarkan Bulan</h4>
                                                        <hr>
                                                   <div class="row">
                                                       
                                                   <div class="form-group mg-t-30 col-2">
                                                <label for="exampleFormControlSelect1">Pilih Status</label>
                                                <select name="status" class="form-control">
                                                  <option value="semua">Semua</option>
                                                    
                                                  <option value="pengajuan">Pengajuan</option>
                                                  <option value="selesai">Selesai</option>
                                              
                                                </select>
                                                             
                                                        </div>
                                                     <div class="form-group mg-t-30 col-3">
                                                             <label for="exampleFormControlInput1">Dari</label>
                                                            <input type="date" class="form-control" id="exampleFormControlInput1"  name="dari">
                                                    </div>
                                                
                                                     <div class="form-group mg-t-30 col-3">
                                                             <label for="exampleFormControlInput1">Sampai</label>
                                                            <input type="date" class="form-control" id="exampleFormControlInput1" name="sampai">
                                                     </div>
                                                     <div class="form-group mg-t-30 col-3">
                                                                <button class="btn btn-warning m-t-30" type="submit">Cetak<i class="fa fa-fw fa-print"></i></button>
                                                     </div>
                                                        </div>
                                                             </form>
                                                        <hr>
                                                       <h4> Lihat Laporan Berdasarkan Bulan ini</h4>
                                                        <hr>
                                                            <form target="_blank" action="<?php echo base_url('laporan/cetakbulanini'); ?>" method="post">
                                                        <div class="row">
                                                <div class="form-group mg-t-30 col-2">
                                                <label for="exampleFormControlSelect1">Pilih Status</label>
                                                <select name="status" class="form-control">
                                                  <option value="semua">Semua</option>
                                                    
                                                  <option value="pengajuan">Pengajuan</option>
                                                  <option value="selesai">Selesai</option>
                                                </select>
                                                             
                                                        </div>
                                                        <div class="form-group mg-t-30 col-4">
                                                                <button class="btn btn-warning m-t-30" type="submit">Cetak<i class="fa fa-fw fa-print"></i></button>
                                                     </div>
                                                            
                                                        </div>
                                                             </form>
                                                        
                                                        
                                                        <h4> Lihat Laporan Berdasarkan Tahun ini</h4>
                                                        <hr>
                                                            <form target="_blank" action="<?php echo base_url('laporan/cetaktahunini'); ?>" method="post">
                                                        <div class="row">
                                                <div class="form-group mg-t-30 col-2">
                                                <label for="exampleFormControlSelect1">Pilih Status</label>
                                                <select name="status" class="form-control">
                                                     <option value="semua">Semua</option>
                                                    
                                                  <option value="pengajuan">Pengajuan</option>
                                                  <option value="selesai">Selesai</option>
                                                </select>
                                                             
                                                        </div>
                                                        <div class="form-group mg-t-30 col-4">
                                                                <button class="btn btn-warning m-t-30" type="submit">Cetak<i class="fa fa-fw fa-print"></i></button>
                                                     </div>
                                                            
                                                        </div>
                                                             </form>

                                                     
                                                    </div>
                                        </div>
                                    </div>

                                </div>
                            
                            </div>
                        
                        </div>
                    
                    </div>

                    
                    

                </div>
            </div>
        </div>
    </section>
   
   
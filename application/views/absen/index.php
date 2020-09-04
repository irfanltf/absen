


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

          	

          <div class="row">
          	
          	<div class="col-lg-12">
          		<?= form_error('menu', '<div class="alert alert-danger" role="alert">','</div>'); ?>

          		<?php echo $this->session->flashdata('message'); ?>

          		<a href="<?php echo base_url('absen/add_lihat') ?>" class="btn btn-primary mb-3" >Add New</a>
          	<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">#</th>
			      <th scope="col">Tanggal</th>
			      <th scope="col">Lokasi</th>
			      <th scope="col">Nama Pekerjaan</th>
			      <th scope="col">Status</th>
			    </tr>
			  </thead>
			  <tbody>
			  	<?php $i = 1; ?>
			  	<?php foreach ($absen as $m) { ?>
			    <tr>
			      <th scope="row"><?php echo $i; ?></th>
			      <td><?php echo $m['tanggal']; ?></td>
			      <td><?php echo $m['lokasi']; ?></td>
			      <td><?php echo $m['pekerjaan']; ?></td>
			      <td>
			      	<span href="" class="badge <?php if($m['status'] == 'selesai'){ echo 'badge-success';}else{echo 'badge-warning';} ?>">

			      <?php echo $m['status']; ?>
			      	
			      </span>
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
<div class="modal fade" id="newmenumodal" tabindex="-1" role="dialog" aria-labelledby="newmenumodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newmenumodal">Add New</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url('absen/add'); ?>" method="post">
      <div class="modal-body">
        <div class="form-group">
	    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $this->session->userdata('name') ?>"required="" readonly>
	  </div>
	   <div class="form-group">
	    <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $this->session->userdata('email') ?>"required="" readonly> 
	  </div>
	   <div class="form-group">
	    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" placeholder="Masukan Nama Perusahaan" required="">
	  </div>
	   <div class="form-group">
	    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukan lokasi" required="">
	  </div>
	   <div class="form-group">
	    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Masukan pekerjaan" required="">
	  </div>
	  <div class="col-md-12">
                    <label>Lokasi</label><br>
                    <div class="form-group col-md-2">
                        <label>Latitude</label>
                        <input type="text" class="form-control input-sm" name='latitude' id='latbox' readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label>Longitude</label>
                        <input type="text" class="form-control input-sm" name='longitude' id='lngbox' readonly>
                    </div>

                </div>
      </div>
      <div class="col-md-12">
	      	<div class="portlet light">
	    <div class="portlet-title">
	        <div class="caption">
	            <span class="caption-helper"><i style="font-size:11px">Drag picker untuk memindahkan titik lokasi</i></span>
	        </div>
	        <div class="actions">
	            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
	        </div>
	    </div>
	    <div class="portlet-body" style="height: auto;">
	        <div id="map" class="map"></div>
	        <div id="marker" title="Marker"></div>
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
    
    <script type="text/javascript">


   
    var pos = ol.proj.fromLonLat([122.86881206118748, 0.7907467593118866]);
    var map = new ol.Map({
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: pos,
            zoom: 15
        }),
        target: 'map'
    });
    var marker_el = document.getElementById('marker');
    var marker = new ol.Overlay({
        position: pos,
        positioning: 'center-center',
        element: marker_el,
        stopEvent: false,
        dragging: true
    });
    map.addOverlay(marker);


    var dragPan;
    map.getInteractions().forEach(function(interaction) {
        if (interaction instanceof ol.interaction.DragPan) {
            dragPan = interaction;
        }
    });

    marker_el.addEventListener('mousedown', function(evt) {
        dragPan.setActive(false);
        marker.set('dragging', true);
        // console.info('start dragging');
    });

    map.on('pointermove', function(evt) {
        if (marker.get('dragging') === true) {
            marker.setPosition(evt.coordinate);
        }
    });

    map.on('pointerup', function(evt) {
        if (marker.get('dragging') === true) {
            // console.info('stop dragging');

            //get selected location
            console.info(evt.pixel);
            console.info(map.getPixelFromCoordinate(evt.coordinate));
            console.info(ol.proj.toLonLat(evt.coordinate));
            var coords = ol.proj.toLonLat(evt.coordinate);
            var lat = coords[1];
            var lon = coords[0];
            // var locTxt = "Latitude: " + lat + " Longitude: " + lon;
            // coords is a div in HTML below the map to display
            // alert(locTxt);
            document.getElementById("latbox").value = lat;
            document.getElementById("lngbox").value = lon;
            //end of get selected location
            dragPan.setActive(true);
            marker.set('dragging', false);
        }
    });
</script>
<style>
    #map {
        width: 100%;
        height: 100%;
        border: 1px solid;
    }

    /* #map {
            position: absolute;
            z-index: 5;
        }  */
    #marker {
        width: 15px;
        height: 15px;
        border: 2px solid;
        background-color: red;
        /* opacity: 0.5; */
        cursor: move;
    }
</style>

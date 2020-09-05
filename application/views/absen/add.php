
      <div class="modal-header">
        <h1 class="modal-title" id="newmenumodal">Absen</h1>
       
         
        </button>
      </div>
      <form action="<?php echo base_url('absen/add'); ?>" method="post">
        <div class="row">
            <div class="col-6">
                
  
        <div class="form-group">
            <label>Nama</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $this->session->userdata('name') ?>"required="" readonly>
      </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo $this->session->userdata('email') ?>"required="" readonly> 
      </div>
            </div>
        </div>
	   
       <label>Lokasi</label><br>
           <div class="form-group">
        <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Masukan lokasi" required="" readonly="">
      </div>
      <div class="row">
          
    
                    <div class="col-6">
                        <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control input-sm" name='latitude' id='latbox' readonly>
                    </div>
                    </div>

                    <div class="col-6">
   <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control input-sm" name='longitude' id='lngbox' readonly>
                    </div>
                    </div>
                    
                 


      </div>
      <div class="col-md-12">
	      	<div class="portlet light">
	    <div class="portlet-title">
	        <div class="caption">
	            <!-- <span class="caption-helper"><i style="font-size:12px">Drag picker untuk memindahkan titik lokasi</i></span> -->
	        </div>
	        <div class="actions">
	            <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""> </a>
	        </div>
	    </div>
	    <div class="portlet-body" style="height: 500px;">
	        <div id="map" class="map"></div>
	        <div id="marker" title="Marker"></div>
	    </div>
</div>
      </div>

      <div class="modal-footer">
        <a href="<?php echo base_url('absen') ?>" class="btn btn-dark" data-dismiss="modal">Kembali</a>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
       </form>


    
    <script type="text/javascript">   

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(displayLocationInfo);
}


function displayLocationInfo(position) {
  const lng = position.coords.longitude;
  const lat = position.coords.latitude;

       document.getElementById("latbox").value = lat;
            document.getElementById("lngbox").value = lng;





const washingtonLonLat = [lng, lat];

    var pos = ol.proj.fromLonLat(washingtonLonLat);


    var map = new ol.Map({
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
        ],
        view: new ol.View({
            center: pos,
            zoom: 14
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


        fetch('http://nominatim.openstreetmap.org/reverse?format=json&lon=' + lng + '&lat=' + lat).then(function(response) {
          return response.json();
        }).then(function(json) {
          console.log(json.display_name);
           document.getElementById("lokasi").value = json.display_name;
          
        })
      
    //   map.on('click', function(e) {
    //     var coordinate = ol.proj.toLonLat(e.coordinate).map(function(val) {
    //       return val.toFixed(6);
    //     });
    //     // var lon = document.getElementById('lon').value = coordinate[0];
    //     // var lat = document.getElementById('lat').value = coordinate[1];
    //     simpleReverseGeocoding(lng, lat);
    //   });



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

        fetch('http://nominatim.openstreetmap.org/reverse?format=json&lon=' + lon + '&lat=' + lat).then(function(response) {
          return response.json();
        }).then(function(json) {
          console.log(json.display_name);
           document.getElementById("lokasi").value = json.display_name;
        })
        }
    });
}


</script>
<style>
    #map {
        width: 100%;
        height: 100%;
        border: 5px green solid;
    }

    /* #map {
            position: absolute;
            z-index: 5;
        }  */
    #marker {
        width: 15px;
        height: 15px;
        border: 3px solid;
        border-radius: 50%;
        background-color: green;
        /* opacity: 0.5; */
        cursor: move;
    }
</style>
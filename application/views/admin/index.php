<style type="text/css">
	#container {
  height: 400px;
}

.highcharts-figure, .highcharts-data-table table {
  min-width: 310px;
  max-width: 800px;
  margin: 1em auto;
}

#datatable {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #EBEBEB;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}
#datatable caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}
#datatable th {
	font-weight: 600;
  padding: 0.5em;
}
#datatable td, #datatable th, #datatable caption {
  padding: 0.5em;
}
#datatable thead tr, #datatable tr:nth-child(even) {
  background: #f8f8f8;
}
#datatable tr:hover {
  background: #f1f7ff;
}
</style>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

<div class="row card">
	<div class="col-12">
		
		<figure class="highcharts-figure">
  <div id="container"></div>




  <table id="datatable">
    <thead>
      <tr>
        <th></th>
        <th>Telat</th>
        <th>Tepat Waktu</th>
      </tr>
    </thead>
    <tbody>
    	<?php $tahun = date('Y') ?>
    	<?php $bln = $this->db->query("SELECT month(jam_absen) as bulan, COUNT(month(jam_absen)) as jam_absen, rentan FROM `sec_absen` WHERE year(jam_absen) = '$tahun' GROUP BY month(jam_absen)")->result(); ?>
    	<?php foreach ($bln as $key): ?>
    		
      <tr>
        <th><?php 

        	switch ($key->bulan) {
        		
        		case 1:
        			echo "Januari";
        			break;
        		case 2:
        			echo "Februari";
        			break;
        		case 3:
        			echo "Maret";
        			break;
        		case 4:
        			echo "April";
        			break;
        		case 5:
        			echo "Mei";
        			break;
        		case 6:
        			echo "Juni";
        			break;
        		case 7:
        			echo "Juli";
        			break;
        		case 8:
        			echo "Agustus";
        			break;
        		case 9:
        			echo "September";
        			break;
        		case 10:
        			echo "Oktober";
        			break;
        		case 11:
        			echo "November";
        			break;
        		case 12:
        			echo "Desember";
        			break;
        		default:
        			"-";
        			break;
        	}


        ?></th>



<?php $telat = $this->db->query("SELECT COUNT(month(jam_absen)) as jlh FROM `sec_absen` WHERE rentan > 1 AND  month(jam_absen) = '$key->bulan' AND year(jam_absen) = '$tahun'")->row(); ?>

        <td><?= $telat->jlh ?></td>


<?php $tepatwaktu = $this->db->query("SELECT COUNT(month(jam_absen)) as jlh FROM `sec_absen` WHERE rentan < 1 AND  month(jam_absen) = '$key->bulan' AND year(jam_absen) = '$tahun'")->row(); ?>
        <td><?= $tepatwaktu->jlh ?></td>
      </tr>
      
    	<?php endforeach ?>
    </tbody>
  </table>
</figure>
	</div>		
</div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

            <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

     
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		 $this->load->library('pdf');

	}

	
	public function index()
	{
		$data['title'] = 'Laporan';
		$data['user']=$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['absen'] = $this->db->get('absensi')->result_array();




		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('laporan/index', $data);
		$this->load->view('templates/footer');
		
	}

	public function cari()
	{

		$dari = $this->input->post('dari');
		$sampai = $this->input->post('sampai');
$status = $this->input->post('status');



$query = "
	SELECT * FROM absensi
	WHERE `absensi`.`jam_absen` BETWEEN '$dari' AND '$sampai' 
";
  






$donor = $this->db->query($query)->result_array();


		 $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
         $pdf->SetMargins(10,10,20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',22);
        // mencetak string 
        $pdf->Cell(190,9,'Laporan Data Absensi',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,9,'Tanggal '.$dari. ' Sampai '.$sampai,0,1,'C');
        
      
        // Memberikan space kebawah agar tidak terlalu rapat


     $pdf->Cell(10,8,'',0,1);



        // Field
  $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,8,'No. ',1,0, 'C');
         $pdf->Cell(25,8,'Nama',1,0, 'C');
        $pdf->Cell(25,8,'Email',1,0, 'C');
        $pdf->Cell(17.5,8,'Tanggal',1,0, 'C');
        $pdf->Cell(17.5,8,'Jam Absen',1,0, 'C');
        $pdf->Cell(17.5,8,'Jadwal',1,0, 'C');
        $pdf->Cell(60,8,'Lokasi',1,0, 'C');
        $pdf->Cell(21,8,'Keterlambatan',1,1, 'C');


          $pdf->SetFont('Arial','',6);
$i=1;
foreach ($donor as $key) {
	$pdf->Cell(7,8,$i,1,0, 'C');
	$pdf->Cell(25,8,$key['nama'],1,0, 'B');
  $pdf->Cell(25,8,$key['email'],1,0, 'B');
  $pdf->Cell(17.5,8,date('d - m -  Y ', strtotime( $key['jam_absen'])),1,0, 'B');
  $pdf->Cell(17.5,8,date('H:i ', strtotime( $key['jam_absen'])),1,0, 'B');
	$pdf->Cell(17.5,8,date('H:i ', strtotime( $key['jam_jadwal'])),1,0, 'B');
	$pdf->Cell(60,8,$key['lokasi'],1,0, 'C');


$date1 = strtotime( $key['jam_absen']);
$date2 = strtotime($key['jam_jadwal']);
;
$interval = $date1 - $date2;
$seconds = $interval % 60;
$minutes = floor(($interval % 3600) / 60);
$hours = floor($interval / 3600);


	$pdf->Cell(21,8, $hours." jam ".$minutes. 'menit',1,1, 'C');

$i++;
}
 


     	
        $pdf->Cell(10,25,'',0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,8,'',0,1,'C');
        $pdf->Cell(0,8,'',0,1,'C');
        $pdf->Cell(125,50,'Mengetahui',0,0,);
   
         $pdf->Cell(10,25,'',0,1);
          $pdf->Cell(0,0,'',0,1,'C');
          $pdf->Cell(0,5,'',0,1,'C');
        $pdf->Cell(125,5,'Kepala Pt Sysware',0,0,);
  
        $pdf->Cell(0,5,'',0,1,'C');
        $pdf->Cell(125,40,'............................',0,0,);
       





       
        $pdf->Output();
        $pdf->Output();

	}


	public function cetakbulanini()
	{

		$bulan = date('m');
		$bulans = date('F');

		
	
$status = $this->input->post('status');



$query = "
	SELECT * FROM absensi
	
	WHERE month(`jam_absen`) =  '$bulan'
";



$donor = $this->db->query($query)->result_array();


	 $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
         $pdf->SetMargins(10,10,20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',22);
   
        // mencetak string 
        $pdf->Cell(190,13,'Laporan Data Absensi',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,13,'Bulan ' .$bulans,0,1,'C');
        
      
        // Memberikan space kebawah agar tidak terlalu rapat


     $pdf->Cell(10,8,'',0,1);



  $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,8,'No. ',1,0, 'C');
         $pdf->Cell(25,8,'Nama',1,0, 'C');
        $pdf->Cell(25,8,'Email',1,0, 'C');
        $pdf->Cell(17.5,8,'Tanggal',1,0, 'C');
        $pdf->Cell(17.5,8,'Jam Absen',1,0, 'C');
        $pdf->Cell(17.5,8,'Jadwal',1,0, 'C');
        $pdf->Cell(60,8,'Lokasi',1,0, 'C');
        $pdf->Cell(21,8,'Keterlambatan',1,1, 'C');


          $pdf->SetFont('Arial','',6);
$i=1;
foreach ($donor as $key) {
  $pdf->Cell(7,8,$i,1,0, 'C');
  $pdf->Cell(25,8,$key['nama'],1,0, 'B');
  $pdf->Cell(25,8,$key['email'],1,0, 'B');
  $pdf->Cell(17.5,8,date('d - m -  Y ', strtotime( $key['jam_absen'])),1,0, 'B');
  $pdf->Cell(17.5,8,date('H:i ', strtotime( $key['jam_absen'])),1,0, 'B');
  $pdf->Cell(17.5,8,date('H:i ', strtotime( $key['jam_jadwal'])),1,0, 'B');
  $pdf->Cell(60,8,$key['lokasi'],1,0, 'C');


$date1 = strtotime( $key['jam_absen']);
$date2 = strtotime($key['jam_jadwal']);
;
$interval = $date1 - $date2;
$seconds = $interval % 60;
$minutes = floor(($interval % 3600) / 60);
$hours = floor($interval / 3600);


  $pdf->Cell(21,8, $hours." jam ".$minutes. 'menit',1,1, 'C');

$i++;
}
 


     	

      
        $pdf->Cell(10,25,'',0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,8,'',0,1,'C');
        $pdf->Cell(0,8,'',0,1,'C');
        $pdf->Cell(125,50,'Mengetahui',0,0,);
   
         $pdf->Cell(10,25,'',0,1);
          $pdf->Cell(0,0,'',0,1,'C');
          $pdf->Cell(0,5,'',0,1,'C');
        $pdf->Cell(125,5,'Kepala Pt Sysware',0,0,);
  
        $pdf->Cell(0,5,'',0,1,'C');
        $pdf->Cell(125,40,'............................',0,0,);






       
        $pdf->Output();
        $pdf->Output();

	}

	public function cetaktahunini()
	{

		$tahun = date('Y');
	

	$status = $this->input->post('status');



$query = "
 SELECT * FROM absensi
	WHERE year(`jam_absen`) =  '$tahun'
";





$donor = $this->db->query($query)->result_array();


		 $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
         $pdf->SetMargins(10,10,20);
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',22);
        // mencetak string 
        $pdf->Cell(190,13,'Laporan Data Absensi',0,1,'C');
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(190,13,'Tahun ' .$tahun,0,1,'C');
        
      
        // Memberikan space kebawah agar tidak terlalu rapat


     $pdf->Cell(10,8,'',0,1);




   $pdf->SetFont('Arial','B',8);
        $pdf->Cell(7,8,'No. ',1,0, 'C');
         $pdf->Cell(25,8,'Nama',1,0, 'C');
        $pdf->Cell(25,8,'Email',1,0, 'C');
        $pdf->Cell(17.5,8,'Tanggal',1,0, 'C');
        $pdf->Cell(17.5,8,'Jam Absen',1,0, 'C');
        $pdf->Cell(17.5,8,'Jadwal',1,0, 'C');
        $pdf->Cell(60,8,'Lokasi',1,0, 'C');
        $pdf->Cell(21,8,'Keterlambatan',1,1, 'C');


          $pdf->SetFont('Arial','',6);
$i=1;
foreach ($donor as $key) {
  $pdf->Cell(7,8,$i,1,0, 'C');
  $pdf->Cell(25,8,$key['nama'],1,0, 'B');
  $pdf->Cell(25,8,$key['email'],1,0, 'B');
  $pdf->Cell(17.5,8,date('d - m -  Y ', strtotime( $key['jam_absen'])),1,0, 'B');
  $pdf->Cell(17.5,8,date('H:i ', strtotime( $key['jam_absen'])),1,0, 'B');
  $pdf->Cell(17.5,8,date('H:i ', strtotime( $key['jam_jadwal'])),1,0, 'B');
  $pdf->Cell(60,8,$key['lokasi'],1,0, 'C');


$date1 = strtotime( $key['jam_absen']);
$date2 = strtotime($key['jam_jadwal']);
;
$interval = $date1 - $date2;
$seconds = $interval % 60;
$minutes = floor(($interval % 3600) / 60);
$hours = floor($interval / 3600);


  $pdf->Cell(21,8, $hours." jam ".$minutes. 'menit',1,1, 'C');

$i++;
}
 


 
      
        $pdf->Cell(10,25,'',0,1);
        $pdf->SetFont('Arial','',12);
        $pdf->Cell(0,8,'',0,1,'C');
        $pdf->Cell(0,8,'',0,1,'C');
        $pdf->Cell(125,50,'Mengetahui',0,0,);
   
         $pdf->Cell(10,25,'',0,1);
          $pdf->Cell(0,0,'',0,1,'C');
          $pdf->Cell(0,5,'',0,1,'C');
        $pdf->Cell(125,5,'Kepala Pt Sysware',0,0,);
  
        $pdf->Cell(0,5,'',0,1,'C');
        $pdf->Cell(125,40,'............................',0,0,);






       
        $pdf->Output();
        $pdf->Output();

	}

	


}
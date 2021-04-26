<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	
	public function index()
	{
		$data['title'] = 'Isi Absen';
		$data['user']=$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['absen'] = $this->db->get_where('sec_absen', ['email' => $this->session->userdata('email')])->result_array();




		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('absen/index', $data);
		$this->load->view('templates/footer');
		
	}

	// 	public function lihat()
	// {
	// 	$data['title'] = 'Absensi Pekerjaan';
	// 	$data['user']=$this->db->get_where('user', ['email' =>
	// 	$this->session->userdata('email')])->row_array();

	// 	$data['absen'] = $this->db->get_where('absensi')->result_array();




	// 	$this->load->view('templates/header', $data);
	// 	$this->load->view('templates/sidebar', $data);
	// 	$this->load->view('templates/topbar', $data);
	// 	$this->load->view('absen_admin/index', $data);
	// 	$this->load->view('templates/footer');
		
	// }

public function add_lihat(){
			$data['title'] = 'Absensi Pekerjaan';
		$data['user']=$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();





		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('absen/add', $data);
		$this->load->view('templates/footer');
		
}
	public function add(){

		
		$w = $this->db->get_where('jadwal', ['id' => 1])->row();

		
			$data = [
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'lokasi' => $this->input->post('lokasi'),
				'latitude' => $this->input->post('latitude'),
				'longitude' => $this->input->post('longitude'),
				'jam_jadwal' => $w->waktu
			];
			$this->db->insert('absensi', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Added </div>');
			redirect('absen');
		
	}


}
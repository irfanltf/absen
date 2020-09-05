<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen_admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}

	
	public function index()
	{
		$data['title'] = 'Lihat Absen';
		$data['user']=$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['absen'] = $this->db->get('absensi')->result_array();




		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('absen_admin/index', $data);
		$this->load->view('templates/footer');
		
	}
	public function peta($id)
	{
		$data['title'] = 'Lihat Absen';
		$data['user']=$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();

		$data['absen'] = $this->db->get_where('absensi', ['id_absensi' => $id])->row();




		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('absen_admin/peta', $data);
		$this->load->view('templates/footer');
		
	}


		public function acc($id){

			$data = [
				'status' => 'selesai'
			];
			$this->db->where('id_absensi', $id);
			$this->db->update('absensi', $data);
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Accepted </div>');
			redirect('absen_admin');
		
	}

			public function del($id){

	
			$this->db->where('id_absensi', $id);
			$this->db->delete('absensi');
			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Deleted </div>');
			redirect('absen_admin');
		
	}





}
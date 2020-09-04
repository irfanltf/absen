<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
	}


	public function index()
	{
		$data['title'] = 'Dashboard';
		$data['user']=$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}


		public function akun()
	{
		$data['title'] = 'Akun';
		$data['user']=$this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['usr'] = $this->db->query("SELECT user.*, user_role.role FROM user join user_role on user.role_id = user_role.id where role != 'administrator' ORDER BY is_active")->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/akun', $data);
		$this->load->view('templates/footer');
	}

			public function daftarakun()
	{
		$data['title'] = 'Akun Non Aktif';
		$data['user']=$this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['usr'] = $this->db->query("SELECT user.*, user_role.role FROM user join user_role on user.role_id = user_role.id where role != 'administrator'")->result_array();
		
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/daftarakun', $data);
		$this->load->view('templates/footer');
	}

public function add_run()
	{
	

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email];', [
			'is_unique' => 'this email has already registered'

		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
			'matches' => 'Password dont matches',
			'min_length' => 'Password too short'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if( $this->form_validation->run()==false ){
	$data['title'] = 'Akun';
	$data['user']=$this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['usr'] = $this->db->query("SELECT user.*, user_role.role FROM user join user_role on user.role_id = user_role.id")->result_array();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/akun', $data);
		$this->load->view('templates/footer');
		} else{
	$data = [

				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				'is_active' => 1,
				'date_created' => time()
			];

		
			$this->db->insert('user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Created</div>');
		redirect('admin/akun');

	}
	}


	public function del($id){

	$this->db->where('id', $id);
	$this->db->delete('user');
	$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Success Deleted</div>');
	redirect('admin/akun');
	}
	public function edit($id)
	{
		$data['title'] = 'Akun';
		$data['user']=$this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['usr'] = $this->db->query("SELECT * FROM user where id = '$id'")->row();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edit', $data);
		$this->load->view('templates/footer');
	}



	public function edit_run($id)
	{
	

		$this->form_validation->set_rules('name', 'Name', 'required|trim');
		// $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email];', [
		// 	'is_unique' => 'this email has already registered'

		// ]);
		// $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]',[
		// 	'matches' => 'Password dont matches',
		// 	'min_length' => 'Password too short'
		// ]);
		// $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if( $this->form_validation->run()==false ){
	$data['title'] = 'Akun';
		$data['user']=$this->db->get_where('user', ['email' =>$this->session->userdata('email')])->row_array();
		$data['usr'] = $this->db->query("SELECT * FROM user where id = '$id'")->row();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/edit', $data);
		$this->load->view('templates/footer');
		} else{
	$data = [

				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'jabatan' => htmlspecialchars($this->input->post('jabatan', true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => htmlspecialchars($this->input->post('role_id', true)),
				'is_active' => htmlspecialchars($this->input->post('aktif', true)),
				// 'date_created' => time()
			];

			$this->db->where('id', $id);
			$this->db->update('user', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Changed</div>');
		redirect('admin/akun');

	}
	}

	public function role()
	{
		$data['title'] = 'Role';
		$data['user']=$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$data['role'] = $this->db->get('user_role')->result_array();


		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role', $data);
		$this->load->view('templates/footer');
	}



	public function roleaccess($role_id)
	{
		$data['title'] = 'Role';
		$data['user']=$this->db->get_where('user', ['email' =>
		$this->session->userdata('email')])->row_array();
		
		$data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=', 1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('templates/topbar', $data);
		$this->load->view('admin/role-access', $data);
		$this->load->view('templates/footer');
	}

	public function changeaccess()
	{
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleId');


		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result = $this->db->get_where('user_access_menu', $data);

		if($result->num_rows() < 1){
			$this->db->insert('user_access_menu', $data);

		}else{
			$this->db->delete('user_access_menu', $data);
		}
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed</div>');
	}

}
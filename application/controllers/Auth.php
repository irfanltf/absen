<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		if ($this->session->userdata('email')){
			redirect('user');
		}


		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == false){
		$data['title'] = 'login Page';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/login');
		$this->load->view('templates/auth_footer');
	}else{

		$this->_login();
		}
	}
		
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');


		$user = $this->db->get_where('user', ['email' => $email])->row_array();
			//usernya ada
		if($user){
			//jika usernya aktif
			if($user['is_active'] == 1){

				if($user['jabatan'] != '-'){

									//cek password
				if(password_verify($password, $user['password'])){
					$data = [
					'email' => $user['email'],
					'name' => $user['name'],
					'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);

					if($user['role_id'] == 1 ){
						redirect('admin');
					}else{

					redirect('user');
					}
				}else{
					$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Wrong Password
</div>');
			redirect('auth');
				}


				}else{
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Akun belum aktif silahkan hubungi admin </div>');
			redirect('auth');
				}



			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Email is not Activated </div>');
			redirect('auth');
			}


		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered </div>');
			redirect('auth');
		}
	}




	public function registration()
	{
		if ($this->session->userdata('email')){
			redirect('user');
		}
		
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

		$data['title'] = 'Aplikasi Absensi';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/registration');
		$this->load->view('templates/auth_footer');
		} else{
			$email = $this->input->post('email', true);
			$data = [

				

				'name' => htmlspecialchars($this->input->post('name', true)),
				'email' => htmlspecialchars($email),
				'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
				'jabatan' => '-',
				'image' => 'default.png',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 0,
				'date_created' => time()
			];

			//token
			$token = base64_encode(random_bytes(32));
			$user_token = [
				'email' =>$email,
				'token' =>$token,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->db->insert('user_token', $user_token);

			$this->_sendEmail($token, 'verify');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
  Congratulation! your account has been created. Please Activate your account!
</div>');
			redirect('auth');
		}
		
	}

	private function _sendEmail($token, $type){
		$config = [

			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.gmail.com',
			'smtp_user' => 'iluthfi919@gmail.com',
			'smtp_pass' => 'irfanlutfi',
			'smtp_port' => 465,
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'newline' => "\r\n"
		];

		

		$this->load->library('email', $config);
		$this->email->initialize($config);
		$this->email->from('iluthfi919@gmail.com','Irfan Lutfi');
		$this->email->to($this->input->post('email'));

		if($type == 'verify'){
			$this->email->subject('account Verification');
			$this->email->message('Clik this link to verify your account : <a href="'. base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Activated<a/>');
		}else if($type == 'forgot'){
			$this->email->subject('Reset Password');
			$this->email->message('Clik this link to reset your password : <a href="'. base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '" >Reset Password<a/>');
		}

		
		if($this->email->send()){
			return true;
	}else{
		echo $this->email->print_debugger();
		die;
	}
}

public function verify()
{
	$email = $this->input->get('email');
	$token = $this->input->get('token');


	$user = $this->db->get_where('user', ['email' => $email])->row_array();

	if($user){
		$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
		if ($user_token) {
			if(time()-$user_token['date_created'] < (60*60*24)){

				$this->db->set('is_active', 1);
				$this->db->where('email', $email);
				$this->db->update('user');

				$this->db->delete('user_token', ['email' => $email]);
				$this->session->set_flashdata('message', '<div class="alert alert-succes" role="alert">'. $email .'has been activated!, Please login!</div>');
				redirect('auth');
			}else{
				$this->db->delete('user', ['email' => $email]);
				$this->db->delete('user_token', ['email' => $email]);

				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
Token Expired!
</div>');
			redirect('auth');
			}
		}else{
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
Token Invalid!
</div>');
			redirect('auth');
		}
}else{
		$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
Account activation failid! Wrong email
</div>');
			redirect('auth');

	}
}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
 You have been logged out
</div>');
			redirect('auth');
	}


	public function blocked()
	{
		$this->load->view('auth/blocked');
	}


	public function forgotpassword()
	{

		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

		if($this->form_validation->run() == false ){

		$data['title'] = 'Forgot Password';
		$this->load->view('templates/auth_header', $data);
		$this->load->view('auth/forgotpassword');
		$this->load->view('templates/auth_footer');

		}else{
			$email = $this->input->post('email');
			$user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

			if($user){
				$token = base64_encode(random_bytes(32));
				$user_token = [
					'email' => $email,
					'token' => $token,
					'date_created' => time()
				];


				$this->db->insert('user_token', $user_token);
				$this->_sendEmail($token, 'forgot');
				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Please check your email to resset your password!
				</div>');
							redirect('auth/forgotpassword');
			}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Email is not registered or Activated!
				</div>');
							redirect('auth/forgotpassword');
	}
			}
		}


		public function resetpassword(){
			$email = $this->input->get('email');
			$token = $this->input->get('token');

			$user = $this->db->get_where('user', ['email' => $email])->row_array();

			if($user){
					$user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
					if($user_token){
						$this->session->set_userdata('reset_email', $email);
						$this->changepassword();
					}else{
						$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Reset Password Failid! Wrong Token
				</div>');
							redirect('auth');
					}
			}else{
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
				Reset Password Failid! Wrong Email
				</div>');
							redirect('auth');
			}
		}

		public function changepassword()
		{
			if(!$this->session->userdata('reset_email')){
				redirect('auth');
			}

			$this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
			$this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');
		if($this->form_validation->run() == false){
			$data['title'] = 'Change Password';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/change_password');
			$this->load->view('templates/auth_footer');
		}else{
			$password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
			$email= $this->session->userdata('reset_email');

			$this->db->set('password', $password);
			$this->db->where('email', $email);
			$this->db->update('user');


			$this->session->unset_userdata('reset_email');

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
				Password has been changed! Please Login
				</div>');
							redirect('auth');
		}
		

		}
		
	}





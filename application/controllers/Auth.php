<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('user_id', 'Employee ID', 'required|trim|numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');


		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$userId = $this->input->post('user_id');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['user_id' => $userId])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'user_id' => $user['user_id'],
					'role_id' => $user['role_id'],
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('admin');
				} else {
					redirect('user');
				}
			} else {
				$this->session->set_flashdata('message_success', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('message_success', '<div class="alert alert-warning" role="alert">Your Id is not registered!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		$this->form_validation->set_rules('user_name', 'Name', 'required|trim');
		$this->form_validation->set_rules('user_id', 'Employee ID', 'required|trim|numeric|is_unique[user.user_id]', [
			'numeric' => 'Your ID Not Valid',
			'is_unique' => 'This ID Has Been Registered'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
			'min_length' => 'Password Too Short',
			'matches' => 'Password Not Match'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'User Registration';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$data = [
				'user_id' => htmlspecialchars($this->input->post('user_id', true)),
				'user_name' => htmlspecialchars($this->input->post('user_name', true)),
				'image' => htmlspecialchars($this->input->post('user_id', true)) . '.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'date_created' => time()
			];

			$this->db->insert('user', $data);
			$this->session->set_flashdata('message_success', '<div class="alert alert-success" role="alert">Congratulation! Please Login</div>');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message_success', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
		redirect('auth');
	}
}

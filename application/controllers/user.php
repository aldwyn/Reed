<?php

	class User extends CI_Controller {

		public function __construct() {
			parent:: __construct();
			$this->load->model('user_model');
		}

		public function create() {
			if ($this->input->post('password') == $this->input->post('confirm_pw')) {
				$user['username'] = $this->input->post('username');
				$user['email'] = $this->input->post('email');
				$user['password'] = $this->input->post('password');
				$user_id = $this->user_model->add($user);
				$this->session->set_userdata('user_id', $user_id);
				redirect('profile/show');
			} else {
				redirect('home/index');
			}
		}

		public function find() {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$user_id = $this->user_model->isRegistered($username, $password);
			if (isset($user_id)) {
				$this->session->set_userdata('user_id', $user_id);
				redirect('profile/show');
			} else {
				redirect('home/index');
			}
		}

	}
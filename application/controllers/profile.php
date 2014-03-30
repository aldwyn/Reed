<?php

	class Profile extends CI_Controller {

		public function __construct() {
			parent:: __construct();
			$this->load->model('user_model');
			$this->load->model('question_model');
		}

		public function show() {
			$data['sess_user'] = $this->session->userdata('user_id');
			$data['user'] = $this->user_model->get($data['sess_user']);
			$data['questions'] = $this->question_model->retrieve();
			$this->load->view('profile/index', $data);
		}

		public function peek($user_id) {
			$data['sess_user'] = $this->session->userdata('user_id');
			$data['user'] = $this->user_model->get($user_id);
			$data['questions'] = $this->question_model->retrieve();
			$this->load->view('profile/index', $data);
		}

	}
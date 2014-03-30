<?php

	class Question extends CI_Controller {

		public function __construct() {
			parent:: __construct();
			$this->load->model('question_model');
		}

		public function create() {
			$question['user_id'] = $this->session->userdata('user_id');
			$question['content'] = $this->input->post('question');
			$question['tags'] = $this->input->post('tags');
			$this->question_model->add($question);
			redirect('profile/show');
		}

		public function delete($q_id) {
			$this->question_model->delete($q_id);
			redirect('profile/show');
		}

		public function show($q_id) {
			$this->load->model('reply_model');
			$this->load->model('user_model');
			$data['question'] = $this->question_model->get($q_id);
			$data['replies'] = $this->reply_model->retrieve($q_id);
			$data['user_id'] = $this->session->userdata('user_id');
			$this->load->view('question/index', $data);
		}

	}
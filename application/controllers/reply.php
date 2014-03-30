<?php

	class Reply extends CI_Controller {

		public function __construct() {
			parent:: __construct();
			$this->load->model('reply_model');
		}

		public function create() {
			$reply['q_id'] = $this->input->post('q_id');
			$reply['user_id'] = $this->session->userdata('user_id');
			$reply['content'] = $this->input->post('reply');
			$this->reply_model->add($reply);
			redirect('question/show/'.$reply['q_id']);
		}

		public function delete($q_id, $r_id) {
			$this->reply_model->delete($r_id);
			redirect('question/show/'.$q_id);
		}

	}
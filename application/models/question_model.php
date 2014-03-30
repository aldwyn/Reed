<?php

	class Question_Model extends CI_Model {

		public function __construct() {
			parent:: __construct();
			$this->load->database();
		}

		public function add($question) {
			$this->db->insert('questions', $question);
		}

		public function get($q_id) {
			$question = $this->db->query(
				"SELECT users.user_id, 
						users.username, 
						questions.q_id, 
						questions.content, 
						questions.tags, 
						questions.date_asked 
				FROM questions 
				INNER JOIN users
				ON questions.user_id = users.user_id
				WHERE q_id = '$q_id'"
				);
			$question = $question->row_array();
			$question['date_asked'] = mdate('%M %d, %Y', strtotime($question['date_asked']));
			return $question;
		}

		public function retrieve() {
			$questions = $this->db->query("SELECT q_id, content FROM questions ORDER BY date_asked DESC LIMIT 30");
			return $questions->result_array();
		}

		public function delete($q_id) {
			$this->db->where('q_id', $q_id);
			$this->db->delete('questions');
		}

	}
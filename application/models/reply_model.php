<?php

	class Reply_Model extends CI_Model {

		public function __construct() {
			parent:: __construct();
			$this->load->database();
		}

		public function add($reply) {
			$this->db->insert('replies', $reply);
		}

		public function retrieve($q_id) {
			$replies = $this->db->query(
				"SELECT users.user_id, 
						users.username, 
						replies.r_id, 
						replies.content, 
						replies.reply_date 
				FROM replies 
				INNER JOIN users 
				ON replies.user_id = users.user_id 
				WHERE replies.q_id = '$q_id' 
				ORDER BY replies.reply_date DESC"
				);
			$replies = $replies->result_array();
			for ($i = 0; $i < sizeof($replies); $i++) {
			 	$replies[$i]['reply_date'] = mdate('%M %d, %Y', strtotime($replies[$i]['reply_date']));
			}
			
			return $replies;
		}

		public function delete($r_id) {
			$this->db->where('r_id', $r_id);
			$this->db->delete('replies');
		}

	}
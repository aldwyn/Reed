<?php

	class User_Model extends CI_Model {

		public function __construct() {
			parent:: __construct();
			$this->load->database();
		}

		public function add($user) {
			$this->db->insert('users', $user);
			return mysql_insert_id();
		}

		public function get($user_id) {
			$this->db->where('user_id', $user_id);
			$this->db->select('*');
			$this->db->from('users');
			$user = $this->db->get();
			return $user->row_array();
		}

		public function isRegistered($username, $password) {
			$isRegistered = $this->db->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");			
			return $isRegistered->row_array()['user_id'];
		}

	}

?>
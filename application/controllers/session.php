<?php

	class Session extends CI_Controller {

		public function logout() {
			$this->session->sess_destroy();
			redirect('home/index');
		}

	}
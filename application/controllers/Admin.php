<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function index() {
		
		$this->load->view('templates/header');
		$this->load->view('admin/welcome');
		
		
	}

	public function bookings() {
		// $this->load->view('templates/header');
		$this->load->view('templates/header');
		$this->load->view('admin/bookings');
		// $this->load->view('templates/footer');
	}
	
	public function clients() {
		$this->load->view('templates/header');
		$this->load->view('admin/clients');
	}
	
	public function number() {
		$this->load->view('templates/header');
		$this->load->view('admin/number');
	}
}
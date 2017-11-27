<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// if($this->session->userdata('username')==""){
		// 	redirect('login');
		// }
	}

	public function index()
	{
		$this->load->view('nav');	
		$this->load->view('home');	
		$this->load->view('foot');	

	}
	public function coba()
	{
		$this->load->view('nav');	
		$this->load->view('coba');	
		$this->load->view('foot');	

	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
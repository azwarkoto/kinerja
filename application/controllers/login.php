<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('M_penilai');
	}

	public function index()
	{
		$this->load->view('login');
		$kode = "";
		//var_dump($this->input->post('login'));
		if($this->input->post('login')){

			$user=$this->input->post("username");
			$psswd=$this->input->post("psswd");
			if ($user=='admin' && $psswd='admin') {
				$status=TRUE;
			}else{
				$data=$this->M_penilai->selectByAll();
					foreach ($data as $row) {

					if($row->username==$user){
						//var_dump($row->email);
						if($row->password==$psswd){
							//var_dump($row->psswd);
							$status=TRUE;
							$kode=$row->kodepenilai;
						}
					}

				}
			}

		if(isset($status) and $status==TRUE){
			if($kode==""){$kode="PNL0000000";}
				$sessionku = array('username' => $user,'kodepenilai'=>$kode);
				$this->session->set_userdata($sessionku);
				redirect('home','refresh');
		}else{
			echo "<script>alert('Login gagal')</script>";
		}
}		//var_dump($status);


	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
	public function checksession(){
		if($this->session->userdata('username')==""){
			redirect('login');
		}
	}


}

/* End of file login.php */
/* Location: ./application/controllers/login.php */

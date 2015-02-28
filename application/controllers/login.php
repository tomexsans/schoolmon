<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Login extends CI_Controller {


	public function index()
	{

		$data['title'] = 'Tarlac State University';
		$this->load->view('header',$data);
		$this->load->view('login');
		$this->load->view('footer');
	}

	//session logout destroy cookie data
	function logout()
 	{
   			$this->session->unset_userdata('logged_in');
   			session_destroy();
  			redirect('login', 'refresh');
 	}


}


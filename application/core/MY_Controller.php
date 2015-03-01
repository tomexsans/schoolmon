<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->authenticate();
		$this->sy = $this->_currentUser();
	}

   function authenticate(){
		if(empty($this->session->userdata['logged_in'])){
			redirect('login','refresh');
		}
	}

	private function _currentUser(){
		$this->load->model('admin_model');
		return $this->admin_model->return_year_semester();
	}
}

/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
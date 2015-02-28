<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Verifylogin extends CI_Controller {
   public function __construct()
 		{
  		parent::__construct();
		//load model and helper
  		$this->load->model('user_model');
      $this->load->model('log_model');
	    $this->load->helper("url");
 		}

	public function index()
	{

  	$data['title'] = 'Tarlac State University';
  	$this->load->view('header',$data);
	  $this->load->view('login');
	  $this->load->view('footer');    
   
	}
	

  function writelogs($userid=NULL,$status=NULL){

    $date = new DateTime();
    $stamp = $date->format('Y-m-d H:i:s');

    $data = array(
                  'userid' =>$userid,
                  'logdatetime' => $stamp,
                  'status' => $status

                    );

    $this->log_model->writelog($data);

  }
	
	public function process(){

		  //This method will have the credentials validation
   $this->load->library('form_validation');

   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   if($this->form_validation->run() == FALSE)
   	{
     $this->index();
   	}
   else
   {
     
     $data = $this->user_model->getuserlevel($this->input->post('email'));
	 
	
	  foreach ($data as $row) {
		  $ulevel =  $row->userlevel;
      $status =  $row->status;
	  }
	  
	  
	    if($ulevel==0){
	    	 
	    	    if($status==1){ //active
            echo 'Redirecting to Admin Dashboard...';
            //$this->writelogs($this->session->userdata['logged_in']['userid'],'LOG-IN');
            redirect('admin', 'refresh');
            }


            else{
              //not active
              $this->displayerror('Account Inactive!','Please contact administrator for account activation.');

            }

	    }

      elseif ($ulevel==2) {

            if($status==1){ //active
            echo 'Redirecting to Checker Dashboard...';
            $this->writelogs($this->session->userdata['logged_in']['userid'],'LOG-IN');
            redirect('checker', 'refresh');
            }


            else{
              //not active
              $this->displayerror('Account Inactive!','Please contact administrator for account activation.');

            }
       
      }
		
		else{

			   if($status==1){ //active
            echo 'Redirecting to Admin Dashboard...';
            $this->writelogs($this->session->userdata['logged_in']['userid'],'LOG-IN');
            redirect('admin', 'refresh');
            }
            else{
              //not active
              $this->displayerror('Account Inactive!','Please contact administrator for account activation.');

            }
			
		}
     
     
   }
	}
	
		//session logout destroy cookie data
	function logout()
 	{     
        if($this->session->userdata['logged_in']['userlevel']!=0){
           $this->writelogs($this->session->userdata['logged_in']['userid'],'LOG-OUT');
        }
       
   			$this->session->unset_userdata('logged_in');
   			session_destroy();
  			redirect('login', 'refresh');
 	}
	



  function displayerror($header=NULL,$message=NULL){

      $data['title']  = 'Tarlac State University';
      $data['header'] = $header;
      $data['message'] = $message;

      $this->load->view('Admin/header',$data);
      $this->load->view('Admin/displayerror',$data);
      $this->load->view('Admin/footer');



    
  }
	

	
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('email');
   $password = $this->input->post('password');


   //query the database
 
   $result = $this->user_model->login($username, sha1(md5($password)));

   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         
         'userid' => $row->userid,
         'lastname' => $row->lastname,
         'firstname' => $row->firstname,
         'email' =>$row->email,
         'userlevel' =>$row->userlevel,
         'status' =>$row->status,
         'profilepic' =>$row->profile_img
       
       );
	   
	   
       $this->session->set_userdata('logged_in', $sess_array);
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Email or Password does not match on the database.');
     return false;
   }
 }
	
	
}
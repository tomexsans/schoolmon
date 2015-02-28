<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checker extends CI_Controller {
  

   public function __construct()
 		{
  		parent::__construct();
		//load model and helper
  		$this->load->model('user_model');
  		$this->load->model('admin_model'); //load database model for admin
      $this->load->model('checker_model');
	    $this->load->helper("url");
        $this->authenticate();

        //for crud
        $this->load->database();
		$this->load->library('grocery_CRUD');

 		}

	public function index()
	{
    $data['title'] = 'Tarlac State University';
    $data['college'] = $this->checker_model->getcollege();
    $this->load->view('Checker/header',$data);
    $this->load->view('Checker/dashboard',$data);
    $this->load->view('Checker/footer');
  }

  function authenticate(){

       if(empty($this->session->userdata['logged_in'])){
          redirect('login','refresh');
          }
    }

  function college($cid=NULL){


    $data['title'] = 'Tarlac State University';
    $data['college'] = $this->checker_model->getcollege();

    $cid = $this->uri->segment(3);
    $temp = $cid;


    $data['col']   = $this->whoiscollege($cid);
    $data['room']  = $this->checker_model->getrooms($temp);
    


    $this->load->view('checker/header',$data);
    $this->load->view('checker/college',$data);
    $this->load->view('checker/footer');


  }  

  function whoiscollege($cid){

      $query = $this->checker_model->getcollegeid($cid);

      foreach ($query as $key ) {
         $temp =  $key->name;
      }

      return $temp;



  }

  function savedtr(){

    echo 'Saving Record . . .';
      $room = $this->input->post('room');
      $day  = $this->input->post('day');
      $time = $this->input->post('time');
      $period = $this->input->post('period');
      $faculty = $this->input->post('faculty');
      $status = $this->input->post('status');
      $remarks = $this->input->post('remarks');


      $date = new DateTime();
      $stamp = $date->format('Y-m-d H:i:s');

      $data= array(
                          'room' => $room,
                          'day'  => $day,
                          'time' => $time,
                          'period'  => $period,
                          'fid'     => $faculty,
                          'datetime' => $stamp,
                          'status'  => $status,
                          'remarks' =>$remarks
                                );

      $this->checker_model->savedtr($data);
      redirect('checker','refresh');



  }


  function remarks(){

      $room = $this->input->post('room');
      $day  = $this->input->post('day');
      $time = $this->input->post('time');
      $period = $this->input->post('period');
      $faculty = $this->input->post('faculty');
      $fidname = $this->whois($faculty);
      
      $date = new DateTime();
      $stamp = $date->format('Y-m-d H:i:s');
     
      $data['tostored'] = array(
                          'room' => $room,
                          'day'  => $day,
                          'time' => $time,
                          'period'  => $period,
                          'fid'     => $faculty,
                          'datetime' => $stamp,
                          'fidname'  => $fidname
                                );

     

      $data['title']  = 'Tarlac State University';


      $this->load->view('Checker/header',$data);
      $this->load->view('Checker/remarks',$data);
      $this->load->view('Checker/footer');


  }



  function displayerror($header=NULL,$message=NULL){

      $data['title']  = 'Tarlac State University';
      $data['header'] = $header;
      $data['message'] = $message;

      $this->load->view('Admin/header',$data);
      $this->load->view('Admin/displayerror',$data);
      $this->load->view('Admin/footer');



    
  }

    public function whois($userid){
   
  // return $this->assignment_model->whois($userid)->result();
    $data = $this->checker_model->whois($userid)->result() ;     

    foreach ($data as $row) {
      return ' '. ucfirst($row->lastname ). ' ' . ucfirst($row->firstname);
     } 

   }

}  
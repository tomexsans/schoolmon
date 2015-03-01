<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
  

   public function __construct()
	{
		parent::__construct();
		//load model and helper
		$this->load->model('user_model');
		$this->load->model('admin_model'); //load database model for admin
		$this->load->model('log_model');
		$this->load->model('checker_model');
		$this->load->helper("url");
		$this->admin_model->check_school_year();
	   //for crud
	   $this->load->database();
		$this->load->library('grocery_CRUD');

	}

	public function index()
	{
		$data['title'] = 'Tarlac State University';
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/dashboard');
		$this->load->view('Admin/footer');
	}  

    public function reports()
	{
        $data['title'] = 'Tarlac State University';
        $data['date1']  = '';
        $data['date2']  = '';
        $data['report_title']  = '';
        $data['reports'] = NULL;
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/reports',$data);
		$this->load->view('Admin/footer');
            
      
        }  

   public function gen_reports()
	{
		if($this->input->post())
		{

			$date1  = $this->input->post('datestart');
			$date2  = $this->input->post('dateend');	


			$data['report_title'] ="Report from " . $date1 . ' to ' . $date2;   
			$data['title'] = 'Tarlac State University';
			$data['reports'] = $this->admin_model->generate_reports($date1,$date2);
			$data['date1'] = $date1;
			$data['date2'] = $date2;

		}else{
			$data['report_title'] = '';   
			$data['title'] = 'Tarlac State University';
			$data['reports'] = false;
		}


			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/reports',$data);
			$this->load->view('Admin/footer');
	}     

	function logs(){
		$data['title'] = 'Tarlac State University';
		$data['logs']   = $this->log_model->getlogrecords();

		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/logs',$data);
		$this->load->view('Admin/footer');    
      
	}








	function displayerror($header=NULL,$message=NULL){

			$data['title']  = 'Tarlac State University';
			$data['header'] = $header;
			$data['message'] = $message;

			$this->load->view('Admin/header',$data);
			$this->load->view('Admin/displayerror',$data);
			$this->load->view('Admin/footer');



		
	}


    //view faculty
	function faculty(){
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('faculty');

			$crud->set_subject('Faculty');

			$crud->required_fields('lastname','firstname','mi');
			
			
			$crud->display_as('file_url','Faculty Image');
			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();
			$data['title'] = 'Tarlac State University';
			$this->load->view('Admin/header',$data);	
			$this->load->view('Admin/faculty',$output);
	}


	//view checker
	function checker(){
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('checker');

			$crud->set_subject('Checker');


			$crud->required_fields('lastname');
			$crud->required_fields('firstname');
			$crud->required_fields('mi');
			$crud->display_as('file_url','Checker Image');
			$crud->set_field_upload('file_url','assets/uploads/files');

			$output = $crud->render();
			$data['title'] = 'Tarlac State University';
			$this->load->view('Admin/header',$data);	
			$this->load->view('Admin/checker',$output);
	}


	//view college
	function college(){
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('college');

			$crud->set_subject('College Department');
	
			$crud->required_fields('name','college_Code','college_Code','Abv.','dean');
			
			//$crud->required_fields('name','ccode');


			//$crud->display_as('ccode','Abv.');

			//$crud->required_fields('dean');

			$output = $crud->render();
			$data['title'] = 'Tarlac State University';
			$this->load->view('Admin/header',$data);	
			$this->load->view('Admin/college',$output);
	}

	//view checker
	function section(){
			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('sections');

			$crud->set_subject('Section');

			$crud->set_relation('ccode','College','ccode');

			//$crud->required_fields('name','ccode');

			$crud->required_fields('sectioncode','ccode');

			$crud->display_as('sectioncode','Section Code');
            $crud->display_as('ccode','College');


			$output = $crud->render();
			$data['title'] = 'Tarlac State University';
			$this->load->view('Admin/header',$data);	
			$this->load->view('Admin/section',$output);
	}


	//view checker
	function rooms(){


			$crud = new grocery_CRUD();

			$crud->set_theme('flexigrid');
			$crud->set_table('rooms');
			$crud->where('sy',$this->sy->id);

			$crud->set_subject('Rooms');
			$crud->columns('roomcode','sectioncode','fid','college_Code','day','time','period');
		    $crud->field_type('day','dropdown',
            array('MONDAY' => 'MONDAY', 'SATURDAY' => 'SATURDAY' ,'TUESDAY & THURSDAY' => 'TUESDAY & THURSDAY' , 'TUESDAY & WEDNESDAY' => 'TUESDAY & WEDNESDAY','WEDNESDAY & FRIDAY'=>'WEDNESDAY & FRIDAY','THURSDAY & FRIDAY'=>'THURSDAY & FRIDAY',''));

		        $crud->field_type('period','dropdown',
            array('1st' => '1st', '2nd' => '2nd'));

		    $crud->required_fields('roomcode','sectioncode','college_Code','day','time','period','fid');    

			$crud->set_relation('sectioncode','sections','sectioncode');
			$crud->set_relation('fid','faculty','{lastname}' .',' . '{firstname} {mi}' . '.');
			
			$crud->set_relation('ccode','College','name');
			//$crud->required_fields('name','ccode');


			$crud->display_as('roomcode','Room Code');
			$crud->display_as('sectioncode','Section Code');
			$crud->display_as('fid','Faculty');
			$crud->display_as('college_Code','College');
             //$crud->display_as('ccode','College');



			$output = $crud->render();
			$data['title'] = 'Tarlac State University';
			$this->load->view('Admin/header',$data);	
			$this->load->view('Admin/room',$output);
	}



	//view checker
	function users(){
			$crud = new grocery_CRUD();
			$userlevel = $this->session->userdata['logged_in']['userlevel'];
			$crud->set_theme('datatables');
			$crud->set_table('users');
			
			$crud->required_fields('lastname','firstname','mi','address','email','date_Join','status','userlevel');
			
			$crud->set_subject('Users');

			$crud->columns('lastname','firstname','mi','contact_Number','profile_img','userlevel');
			$crud->set_field_upload('profile_img','assets/uploads/files');

			//new action
			$crud->add_action('Set Password', '', 'Admin/setpass','ui-icon-plus');

			$crud->field_type('password','hidden');


			$crud->change_field_type('status', 'true_false');
			$crud->field_type('userlevel','dropdown',
            array('0' => 'Admin', '1' => 'Moderator' ,'2' =>'Checker'));


			$crud->unset_print();
			$crud->unset_export();
			// $crud->unset_jquery();
			// $crud->unset_jquery_ui();

			if($userlevel==1){
				$crud->or_where(array('userlevel' =>1));
				$crud->or_where(array('userlevel' =>2));

              
				$crud->field_type('userlevel','dropdown',
                 array('1' => 'Moderator' ,'2' =>'Checker'));	

			}


			//$crud->change_field_type('status', 'true_false');
			//$crud->field_type('collegeassign','dropdown',
            //array('0' => 'CCS', '1' => 'CBA' ,'2' =>'CHK'));


			//if($userlevel==1){
				//$crud->or_where(array('collegeassign' =>1));
				//$crud->or_where(array('collegeassign' =>2));

              
				//$crud->field_type('collegeassign','dropdown',
                 //array('1' => 'Moderator' ,'2' =>'Checker'));	

			//}

			$output = $crud->render();
			$data['title'] = 'Tarlac State University';

			$this->load->view('Admin/header',$data);	
			$this->load->view('Admin/manage_user',$output);
	}


	function setpass(){
		$id = $this->uri->segment(3);
		$this->session->set_flashdata('changeuserid', $id);
		redirect(base_url() .'Admin/changepass' , 'refresh');
	}

	function changepass(){




		$id= $this->session->flashdata('changeuserid');

		if($id==NULL){
			$this->displayerror('Error','follow the process');
		}
		else{


        $data['title'] = 'Tarlac State University';
		$this->load->view('Admin/header',$data);
		$this->load->view('Admin/changepass');
		$this->load->view('Admin/footer');

		$this->session->set_flashdata('changeuserid', $id);


		}


	}



    public function whois($userid){
   
  // return $this->assignment_model->whois($userid)->result();
    $data = $this->checker_model->whois($userid)->result() ;     

    foreach ($data as $row) {
      return ' '. ucfirst($row->lastname ). ' ' . ucfirst($row->firstname);
     } 

   }

	function updatepassword(){
     $userid = $this->session->flashdata('changeuserid');


     if($userid==NULL) {

     	$this->displayerror('Access Denied','Changing password through address bar are not allowed. ');
     }

     else{

     			    $password = $this->input->post('password');
      				$password = $this->input->post('password2');

     				 $data = array('password'=> sha1(md5($password)));


     				 $this->load->library('form_validation');
     				 $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_validatepassword|max_length[16]');
      				 $this->form_validation->set_rules('password2', 'Retype Password', 'trim|required|xss_clean');

      				    if($this->form_validation->run() == FALSE)
                            {
                            		$this->updatepassword();

                            }

                            else{

                            	echo 'Changing Password...';
       						    $this->user_model->updatepassword($userid,$data);
                                redirect('admin/users', 'refresh');

                            }

      
     }

	}


	public function fileimport($type = false,$id = false){


		if($type === false)
		{
			$data = array();
			$header['title'] = 'Import Schedule';
			$data['type'] = 'import';

			$config['upload_path'] = './imports/';
			$config['allowed_types'] = 'csv';
			$config['max_size']	= '5000';
			$config['file_name']	= time().'_'.md5(time());

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			$data['system_message'] = $this->session->flashdata('system_message');
			$data['imports'] = $this->admin_model->get_saved_imports();

			if($this->input->post())
			{
				if ( ! $this->upload->do_upload())
				{

					$data['uploaderrors'] =  $this->upload->display_errors();	

				}else{
					$importDate = $this->upload->data();
					$result = $this->admin_model->save_imports($importDate);

					if($result === true){
						$this->session->set_flashdata('system_message','<div class="alert alert-success">Uploaded Files were successfully saved.</div>');
						redirect('admin/fileimport');
					}else{
						$data['system_message'] = 'Unable to saved import schedule.';
					}
				}
			}

		}else{

			$type = strtolower(htmlentities($type));
			
			if($type == 'show' OR $type == 'delete'){
				$result = $this->admin_model->get_saved_imports($id);
				$filepath = './imports/'.$result->filename;

				$handle = fopen($filepath,'r');
				$csv_data = array();
				//get csv file data

				while ( ($data = fgetcsv($handle,1000) ) !== FALSE ) {
					$csv_data[] = $data;
				}

				$data['csv'] = count($csv_data) >= 1 ? $csv_data : null;
				$header['title'] = 'Show Schedule';
				$data['type'] = $type;
				$data['data'] = $result;


				if($this->input->post('delete_csv_file')){

					$res = $this->admin_model->delete_csv($id);
					if($res === true){
						$this->session->set_flashdata('system_message', '<div class="alert alert-success">Successfully Deleted CSV FIle.</div>');
						redirect('admin/fileimport');
					}else{
						$data['system_message'] = '<div class="alert alert-danger">Unable to delete CSV File.</div>';
					}
				}

			}
		}

		$this->load->view('Admin/header',$header);
		$this->load->view('Admin/fileimport',$data);
		$this->load->view('Admin/footer');
	}


	public function import_schedule($id = false)
	{
		$this->load->library('input');
		//only ajax calls allowed
		if (!$this->input->is_ajax_request()) {
		   exit('No direct script access allowed');
		}

		
		if($this->input->post('importselectedfiles')){
			
			$result = $this->admin_model->initializeimport($this->input->post());


			header('Content-Type: application/json');
			echo json_encode($result);
			exit();
		}
	}

	public function semester()
	{
		$header['title'] = 'Set School Semester';
		$body['system_message'] = $this->session->flashdata('system_message');
		$body['semesters'] = $this->admin_model->get_semesters();

		$this->load->view('Admin/header',$header);
		$this->load->view('Admin/semester',$body);
		$this->load->view('Admin/footer');

	}

	public function psemester($type,$id = false){

		$header['title'] = $type.' School Semester';
		$body = array();
		$this->load->helper(array('form'));

		if($type == 'new'){
			$body['type'] = 'new';
			$body['form'] = true;


			if($this->input->post('new_year_semester')){

				$post = $this->input->post();
				$result = $this->admin_model->new_semesters($post);

				if($result->status === true){
					$this->session->set_flashdata('system_message', '<div class="alert alert-success"><strong>Success!</strong> '.$result->message.'</div>');
					redirect('admin/semester');
				}else{
					$body['system_message'] = '<div class="alert alert-warning"><strong>Error Encountered</strong> '.$result->message.'</div>';
				}

			}

		}elseif($type == 'edit'){
			$body['type'] = 'edit';
			$body['form'] = $id === false ? false : true;
			$body['semesters'] = $id === false ? false : $this->admin_model->get_semesters($id);
			$body['dataid'] = $id;


			if($this->input->post('edit_year_semester')){
				$post = $this->input->post();
				$result = $this->admin_model->edit_semesters($post,$id);

				if($result->status === true){
					$this->session->set_flashdata('system_message', '<div class="alert alert-success"><strong>Success!</strong> '.$result->message.'</div>');
					redirect('admin/semester');
				}else{
					$body['system_message'] = '<div class="alert alert-warning"><strong>Error Encountered</strong> '.$result->message.'</div>';
				}
			}
		}elseif($type == 'delete'){
			$body['type'] = 'delete';
			$body['form'] = $id === false ? false : true;
			$body['semesters'] = $id === false ? false : $this->admin_model->get_semesters($id);
			$body['dataid'] = $id;

			if($this->input->post('delete_year_semester')){
				$post = $this->input->post();
				$result = $this->admin_model->delete_semesters($id);

				if($result->status === true){
					$this->session->set_flashdata('system_message', '<div class="alert alert-success"><strong>Success!</strong> '.$result->message.'</div>');
					redirect('admin/semester');
				}else{
					$body['system_message'] = '<div class="alert alert-warning"><strong>Error Encountered</strong> '.$result->message.'</div>';
				}
			}

		}elseif($type = 'current'){
			$body['type'] = 'current';
			$body['form'] = $id === false ? false : true;
			$body['semesters'] = $id === false ? false : $this->admin_model->get_semesters($id);
			$body['dataid'] = $id;

			if($this->input->post('current_year_semester')){
				$post = $this->input->post();
				$result = $this->admin_model->current_semesters($id);

				if($result->status === true){
					$this->session->set_flashdata('system_message', '<div class="alert alert-success"><strong>Success!</strong> '.$result->message.'</div>');
					redirect('admin/semester');
				}else{
					$body['system_message'] = '<div class="alert alert-warning"><strong>Error Encountered</strong> '.$result->message.'</div>';
				}
			}
		}

		$this->load->view('Admin/header',$header);
		$this->load->view('Admin/psemester',$body);
		$this->load->view('Admin/footer');
	}
}	
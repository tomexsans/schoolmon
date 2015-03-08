<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('mpdf');
	}

	public function dateFrom($date1 = false,$date2 = false,$college_id = false){
		if($data1 === false OR $date2 === false){
			die('<small style="color:#f00;font-weight:bold">Please Go back, Refresh page and Click Print Report Again.</small>');
			return false;
		}


		$mpdf=new mPDF('c','A4','','' , 10 , 10 , 10 , 10 , 5 , 5);
		$mpdf->SetDisplayMode('fullpage');
		// $mpdf->SetHeader('John Doe');
		$mpdf->SetDisplayMode('fullpage');

		$this->load->model('admin_model');
		// $res = $this->admin_model->genrep($date1,$date2);

	    $dates  = function($begin = false,$end = false)
	    {
	    	// var_dump(strtotime($end));
	    	
	    	if(strtotime($begin) === false || strtotime($end) === false){return false;exit;}

	      $begin = new DateTime($begin);
	      $end = new DateTime($end.' +1 day');
	      $daterange = new DatePeriod($begin, new DateInterval('P1D'), $end);
	      foreach($daterange as $date){
	        $dates[] = $date->format("Y-m-d");
	      }
	      return $dates;
	    };

	  $theDates = $dates($date1,$date2);

	  if($theDates === false){
	  	die('<small style="color:#f00;font-weight:bold">Please Go back, Refresh page and Click Print Report Again.</small>');
	  }
	  foreach ($theDates as $key => $value) {
	  		$res['dates'][$value] = $this->admin_model->genrep($value,$date2,$college_id);
	  }


	  $res['printfor'] = $this->admin_model->getcol($college_id);

		$html = $this->load->view('reports/pdf/datefrom',$res,TRUE);

		// echo $html;
		// exit;
		$mpdf->WriteHTML($html);
		$mpdf->Output($filename,'I');

		exit;//display nothing after pdf output
	}
}

/* End of file reports.php */
/* Location: ./application/controllers/reports.php */
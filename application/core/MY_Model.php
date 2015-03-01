<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	protected $sy;

	public function __construct(){
		parent::__construct();
		$this->sy = $this->get_year_and_semester();
	}

	private function get_year_and_semester(){
		$this->db->where('status',1)->where('current',1)->limit(1);
		$q = $this->db->get('semester');

		if($q->num_rows() >= 1)
		{
			$r = $q->row();

			$prep['id'] = $r->id;
			$prep['code'] = $r->code;
			$prep['from'] = $r->year_from;
			$prep['to'] = $r->year_to;
			$prep['year'] = $r->year_from.' - '.$r->year_to;
			$prep['note'] = $r->comment;


			return (object)$prep;
		}else{
			return null;
		}
	}

	public function return_year_semester(){
		return $this->sy;
	}
}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */
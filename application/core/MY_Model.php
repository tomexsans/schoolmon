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

			$prep['sy_id'] = $r->id;
			$prep['sy_code'] = $r->code;
			$prep['sy_from'] = $r->year_from;
			$prep['sy_to'] = $r->year_to;
			$prep['sy_year'] = $r->year_from.' - '.$r->year_to;
			$prep['sy_note'] = $r->comment;


			return (object)$prep;
		}else{
			return null;
		}
	}

}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */
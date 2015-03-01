<?php
Class Checker_model extends CI_Model
{
	

  function savedtr($data){

        $this->db->insert('dtr',$data);   

  }

	function getcollege(){
    $this -> db -> select('*');
    $this -> db -> from('college');
    $this -> db -> order_by("name", "asc");
    return $this->db->get()->result();
    }

    function getcollegeid($id=NULL){
    $this -> db -> select('*');
    $this -> db -> from('college');
    $this -> db -> where("cid", $id);
    return $this->db->get()->result();
    }

    function getrooms($cid=NULL){

    $this -> db -> select('*');
    $this -> db -> from('rooms');
    $this -> db -> where("ccode", $cid);
    return $this->db->get()->result();

    }


           //get who are user id
   function whois($userid=NULL){

   $this -> db -> select('lastname,firstname,mi');
   $this -> db -> from('faculty');
   $this -> db -> where('fid', $userid);
   $this -> db -> limit(1);
   return $this->db->get();
   }


   function get_faculty($id){
      $q = $this->db->where('fid',$id)->limit(1)->get('faculty');

      if($q->num_rows() >=1 ){return $q->row(); }else{


      $obnject['fid'] = '';
      $obnject['lastname'] = '';
      $obnject['firstname'] = '';
      $obnject['mi'] = '';
      $obnject['file_url'] = '';

      return (object)$obnject;
    }
   }

   function get_dtr($faculty_id,$time){



      $qw = $this->db->select('dtrid')->where('fid',$faculty_id)
               ->where('date(datetime)',date('Y-m-d'))
               ->where('time', $time)
               ->limit(1)
               ->get('dtr');

    
               // print_r($this->db->last_query());exit;

     return $qw->num_rows() >=1 ? true : false;

   }

}
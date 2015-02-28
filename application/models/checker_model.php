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





}
<?php
Class Log_model extends CI_Model
{
	

  function getlogrecords(){

   $this -> db -> select('*');
   $this -> db -> from('logs');
   $this -> db -> order_by('logid','DESC');
   return $this->db->get()->result();
   }

   function writelog($data){
   		$this->db->insert('logs',$data);
  
   }

 }  
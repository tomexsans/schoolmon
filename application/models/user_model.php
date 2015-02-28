<?php
Class user_model extends CI_Model
{
	

	
function getuserlevel($email=NULL){

   $this -> db -> select('userlevel,status');
   $this -> db -> from('users');
   $this -> db -> where('email', $email);
   return $this->db->get()->result();
}

function getuserinfo($userid=NULL){

   $this -> db -> select('*');
   $this -> db -> from('users');
   $this -> db -> where('userid', $userid);
   return $this->db->get()->result();
}


  //function for login return result
function login($email ,$password)
 {
 
   $this -> db -> select('*');
   $this -> db -> from('users');
   $this -> db -> where('email', $email);
   $this -> db -> where('password', $password);

   $this -> db -> limit(1);

   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   		}
   else
   {
     	return false;
   		}
	
		
    }


   function emailcheck($email){
   $this -> db -> select('email');
   $this -> db -> from('users');
   $this -> db -> where('email', $email);
   $this -> db -> limit(1);
 
   $query = $this -> db -> get();

   if($query -> num_rows() == 1)
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }


 
 //write register to the database
	function registeruser($data){
        $this->db->insert('users',$data);			
	}

  function updatepassword($userid,$data){
    $this->db->where('userid', $userid); 
    $this->db->update('users',$data); 


   }
	


	
	
}




?>

<?php
Class Admin_model extends MY_Model
{

  public function check_school_year(){
    $q = $this->db->where('current',1)->where('status',1)->get('semester');

    if($q->num_rows() >= 1){

    }else{
      echo '<div style="position:fixed;width:100%;z-index:9999 !important;border-radius:0" class="alert alert-danger"><strong><i class="fa fa-warning"></i> WARNING</strong> Please Add and Set a School Year Now. <a href="'.site_url('admin/semester').'"><strong>Click Here to Set School Year</strong></a></div>';
    }

  }


  function generate_reports($date1=NULL,$date2=NULL,$col){
   $this ->db->from('dtr')->join('rooms','dtr.room = rooms.roomid','LEFT');
   $this->db->where('dtr.datetime >=', $date1);
   $this->db->where('dtr.datetime <=', $date2);
   $this->db->where('dtr.sy', $this->sy->id);
   $this->db->where('dtr.collegeid', $col);
   $q = $this->db->get();
   // print_r($this->db->last_query());
   // print_r($q->result());
   // die();
   return $q->num_rows() >= 1 ? $q->result() : false;
   // return $this->db->get()->result();
  }


  function genrep($date1=NULL,$date2=NULL,$col)
  {

    $dateExploded = explode('-',$date1);
    $this->db->from('dtr d')
            ->join('rooms rm','rm.roomid = d.room','LEFT')
            ->join('faculty f','f.fid = d.fid','LEFT')
            ->where('YEAR(datetime)', $dateExploded[0])
            ->where('MONTH(datetime)', $dateExploded[1])
            ->where('DAY(datetime)', $dateExploded[2])
            ->where('collegeid',$col);


   $result =  $this->db->get();
    
   if($result->num_rows() >=1 ){
    return $result->result();
   }
  }

  function getcol($colId = ''){
    $q = $this->db->where('cid',$colId)->get('college');

    return $q->num_rows() >= 1 ? $q->row() : false;
  }

  function getAllCollege(){
    $q= $this->db->get('college');

    return $q->num_rows() >= 1 ? $q->result() : false;
  }

	function getalluser(){
   $this -> db -> select('*');
   $this -> db -> from('users');
   $this -> db -> order_by("lastname", "asc");
   return $this->db->get()->result();
  
   }

   //getuser id with limit of 1
   function getuserinfo($userid=NULL)
   {

   $this -> db -> select('*');
   $this -> db -> from('users');
   $this -> db -> where('userid', $userid);
   $this -> db -> limit(1);
   return $this->db->get();

   }

   //update userinfo
   function update_userinfo($userid=NULL,$data){
     $this->db->where('userid',$userid);
     $this->db->update('users',$data);
   }

   public function save_imports($data)
   {
      $current_user = $this->session->userdata('logged_in');
      $date = date('Y-m-d H:i:s');

      $prep['filename'] = $data['file_name'];
      $prep['filepath'] = $data['file_path'];
      $prep['savepath'] = $data['full_path'];
      $prep['uploaded'] = $data['client_name'];
      $prep['size'] = $data['file_size'];
      $prep['uploaded_by_id'] = $current_user['userid'];
      $prep['uploaded_by_name'] = trim($current_user['firstname'].'-'.$current_user['lastname']);
      $prep['uploaded_by_uname'] = $current_user['email'];
      $prep['created_at'] = $date;
      $prep['updated_at'] = $date;
      // $prep['sy'] = $this->sy->id;

      $this->db->insert('schedule_imports',$prep);

      if($this->db->affected_rows() >= 1){
        return true;
      }

      return false;
   }

   public function get_saved_imports($id = false){

    if($id=== false){
      $q = $this->db->select('filename,id,uploaded,created_at,uploaded_by_name,imported')->get('schedule_imports');

      if($q->num_rows() >=1 ){
        return $q->result();
      }

    }else{
      $q = $this->db->select('filename,id,uploaded,created_at,uploaded_by_name,imported')->where('id',$id)->get('schedule_imports');

      if($q->num_rows() >=1 ){
        return $q->row();
      }
    }

    return false;
   }

   public function initializeimport2($post = false)
   {
      if($post === false){
        return (object)array('status'=>false,'message'=>'Unable to retrieve data.');
      }

      $q = $this->db->where('id',$post['id'])->limit(1)->get('schedule_imports');
      
      if($q->num_rows() >=1)
      {
        $data = $q->row();


        //path to file
        $path = './imports/'.$data->filename;

        //create handle
        $handle = fopen($path,'r');
        $csv_data = array();
        //get csv file data
        while ( ($data = fgetcsv($handle,1000) ) !== FALSE ) {
          $csv_data[] = $data;
        }

        if(count($csv_data) >=1)
        {
          unset($csv_data[0]);

          if(count($csv_data[1]) >7)
          {
            foreach($csv_data as $k => $v)
            {
                  //get id of faculty
                  $q1 = $this->db->where('lastname',$v[5])->where('firstname',$v[4])->get('faculty');
                  // $id = $this->db->last_query();
                  $id = $q1->num_rows() >=1 ? $q1->row()->fid : 0;

                  $q2 = $this->db->where('ccode',$v[1])->limit(1)->get('college');
                  // $ccode = $this->db->last_query();
                  $ccode = $q2->num_rows() >=1 ? $q2->row()->cid : 0;

                  $q3 = $this->db->where('sectioncode',$v[7])->limit(1)->get('sections');
                  // $seccode = $this->db->last_query();
                  $seccode = $q3->num_rows() >=1 ? $q3->row()->secid : 0;

                  $prep[$k]['roomcode'] = $v[0];
                  $prep[$k]['sectioncode'] = $seccode;
                  $prep[$k]['ccode'] = $ccode;
                  $prep[$k]['day'] = $v[2];
                  $prep[$k]['time'] = $v[3];
                  $prep[$k]['period'] = $v[6];
                  $prep[$k]['fid'] = $id;
                  $prep[$k]['sy'] = $this->sy->id;
            }

            $this->db->insert_batch('rooms', $prep);

            if($this->db->affected_rows() >=1){

              $this->db->set('imported',1)->where('id',$post['id'])->limit(1)->update('schedule_imports');
              $return = array('status'=>true,'message'=>'Import Was Successfull.');
            }else{
              $return = array('status'=>false,'message'=>'Import Encountered an Error');
            }
          }else{
             $return = array('status'=>false,'message'=>'CSV is lacking some columns ,Please follow the right CSV template for importing schedules');
          }
        }else{
           $return = array('status'=>false,'message'=>'Empty CSV File found.');
        }
      }else{
        $return = array('status'=>false,'message'=>'No Import Found.');
      }

      return (object)$return;
   }

   public function initializeimport($post = false)
   {
      if($post === false){
        return (object)array('status'=>false,'message'=>'Unable to retrieve data.');
      }

      $q = $this->db->where('id',$post['id'])->limit(1)->get('schedule_imports');
      
      if($q->num_rows() >=1)
      {
        $data = $q->row();


        //path to file
        $path = './imports/'.$data->filename;

        //create handle
        $handle = fopen($path,'r');
        $csv_data = array();
        //get csv file data
        while ( ($data = fgetcsv($handle,1000) ) !== FALSE ) {
          $csv_data[] = $data;
        }

        if(count($csv_data) >=1)
        {
          if(count($csv_data[0]) == 48)
          {
            foreach($csv_data as $k => $v)
            {
                  $name = explode(',',$v[16]);
                  $lastname = explode(' ', $name[1]);
                  $college = explode('-', $v[14]);
                  $time = explode(' ',$v[21]);
                  $roomcode = substr($v[21], strpos($v[21], '['));
                  $roomcode = str_replace('[','', $roomcode);
                  $roomcode = str_replace(']','', $roomcode);

                  //get id of faculty
                  $q1 = $this->db->where('lastname',$name[0])->where('firstname',$lastname[1])->get('faculty');
                  // $id = $this->db->last_query();
                  $id = $q1->num_rows() >=1 ? $q1->row()->fid : 0;

                  $q2 = $this->db->where('ccode',$college[0])->limit(1)->get('college');
                  // $ccode = $this->db->last_query();
                  $ccode = $q2->num_rows() >=1 ? $q2->row()->cid : 0;

                  $q3 = $this->db->where('sectioncode',$v[20])->limit(1)->get('sections');
                  // $seccode = $this->db->last_query();
                  $seccode = $q3->num_rows() >=1 ? $q3->row()->secid : 0;


                  // $debug[$k]['name'] = $name;
                  // $debug[$k]['lastname'] = $lastname;
                  // $debug[$k]['college'] = $college;
                  // $debug[$k]['time'] = $time;
                  // $debug[$k]['roomcode'] = $roomcode;

                  $prep[$k]['roomcode'] = $roomcode;
                  $prep[$k]['sectioncode'] = $seccode;
                  $prep[$k]['ccode'] = $ccode;
                  $prep[$k]['day'] = $time[0];
                  $prep[$k]['time'] = $time[1].' '.$time[2].' - '.$time[4].' '.$time[5];
                  $prep[$k]['period'] = $v[6];
                  $prep[$k]['fid'] = $id;
                  $prep[$k]['sy'] = $this->sy->id;
            }

            $this->db->insert_batch('rooms', $prep);

            if($this->db->affected_rows() >=1){

              $this->db->set('imported',1)->where('id',$post['id'])->limit(1)->update('schedule_imports');
              $return = array('status'=>true,'message'=>'Import Was Successfull.');
            }else{
              $return = array('status'=>false,'message'=>'Import Encountered an Error');
            }
          }else{
             $return = array('status'=>false,'message'=>'CSV is lacking some columns ,Please follow the right CSV template for importing schedules');
          }
        }else{
           $return = array('status'=>false,'message'=>'Empty CSV File found.');
        }
      }else{
        $return = array('status'=>false,'message'=>'No Import Found.');
      }

      return (object)$return;
   }

   public function get_semesters($id = false){

    // print_r($this->sy);die();
    $this->db->where('status',1);
    if($id == false){
      $q = $this->db->get('semester');
      return $q->num_rows() >= 1 ? $q->result() : false;
    }else{
      $q = $this->db->where('id',$id)->limit(1)->get('semester');
      return $q->num_rows() >= 1 ? $q->row() : false;
    }
   }

   public function new_semesters($post)
   {
    $date = date('Y-m-d H:i:s');


    $input['code'] = $post['semestername'];
    $input['year_from'] = $post['yearfrom'];
    $input['year_to'] = $post['yearto'];
    $input['comment'] = $post['yearsem_comment'];
    $input['created_at'] = $date;
    $input['updated_at'] = $date;

    $this->db->insert('semester',$input);

    if($this->db->affected_rows() >=1 ){
      $resturn = array('status'=>true,'message'=>'Date was saved.');
    }else{
      $resturn = array('status'=>false,'message'=>'Unable to insert data.');
    }
    return (object)$resturn;
   }

   public function edit_semesters($post,$id)
   {

    $date = date('Y-m-d H:i:s');

    $input['code'] = $post['semestername'];
    $input['year_from'] = $post['yearfrom'];
    $input['year_to'] = $post['yearto'];
    $input['comment'] = $post['yearsem_comment'];
    $input['updated_at'] = $date;

    $this->db->where('id',$id)->update('semester',$input);

    if($this->db->affected_rows() >=1 ){
      $resturn = array('status'=>true,'message'=>'Data was updated.');
    }else{
      $resturn = array('status'=>false,'message'=>'Unable to update data.');
    }
    return (object)$resturn;   
   }

   public function delete_semesters($id){
    $this->db->set('status',0)->where('id',$id)->limit(1)->update('semester');

    if($this->db->affected_rows() >=1 ){
      $resturn = array('status'=>true,'message'=>'Year/Semester was removed from records.');
    }else{
      $resturn = array('status'=>false,'message'=>'Unable to set delete Year/Semester.');
    }
    return (object)$resturn; 
   }

   public function current_semesters($id){
    $this->db->set('current',0)->where('status',1)->update('semester');
    $this->db->set('current',1)->where('status',1)->where('id',$id)->update('semester');

    if($this->db->affected_rows() >=1 ){
      $resturn = array('status'=>true,'message'=>'Data was set to current Year/semester.');
    }else{
      $resturn = array('status'=>false,'message'=>'Unable to set current Year/Semester.');
    }
    return (object)$resturn; 
   }

   public function delete_csv($id = false){
    $this->db->where('id',$id)->limit(1)->delete('schedule_imports');

    // echo $this->db->last_query();
    // die();
    if($this->db->affected_rows() >= 1){
      return true;
    }
    return false;
   }
}

?>
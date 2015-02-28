<div id="wrapper">
  
           <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                   <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>



            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                <li class="text-center">
                    <?php $profilepic = $this->session->userdata['logged_in']['profilepic']; ?>
                    <?php if($profilepic!=NULL){ ?>
                     <img src="<?php echo base_url();?>assets/uploads/files/<?php echo $profilepic;?>" class="img-responsive"/>   
                    
                    <?php }

                    else{

                    ?>    
                     <img src="<?php echo base_url();?>assets/img/find_user.png" class="user-image img-responsive"/>   
                    <?php 
                      }
                    ?>
                    </li>
                    
                
                    
                    <li>
                        <a class="active-menu"  href="#"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>


                      <li>
                        <a   href="<?php echo base_url();?>checker"><i class="fa fa-arrow-left fa-3x"></i> Back</a>
                    </li>

  


                    <li  >
                        <a   href="<?php echo base_url();?>verifylogin/logout"><i class="fa fa-sign-out fa-3x"></i>&nbsp;&nbsp;Sign Out</a>
                    </li>   

                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php print_r($col); ?></h2>   
                      
                    </div>
                </div>              
                      
                <hr />                
                             <table class="table ">
                        <thead>
                            <tr>
                             
              
                            <th>Room</th>
                            <th>Day</th>
                            <th>Time</th>
                            <th>Period</th>
                            <th>Faculty Assign</th>
                            <th></th>
                      
                            </tr>

                            </thead>
                            <tbody>
                             
                               <tr>
                               <?php if($room){ $CI =& get_instance();?> 

                               <?php foreach ($room as $row) {?>
                               <td><?php echo $row->roomcode; ?></td>
                               <td><?php echo $row->day;    ?></td>
                               <td><?php echo $row->time;    ?></td>
                               <td><?php echo $row->period;    ?></td>
                               <td><?php echo $CI->whois($row->fid);    ?></td>
                               <td span="20px">
                               <form method="post" action ="<?php echo base_url(); ?>checker/remarks">
                               <input type="hidden" name="room" id="room" value="<?php echo $row->roomcode;?>">
                               <input type="hidden" name="day" id="day" value="<?php echo $row->day;?>">
                               <input type="hidden" name="time" id="time" value="<?php echo $row->time;?>">
                               <input type="hidden" name="period" id="period" value="<?php echo $row->period;?>">
                               <input type="hidden" name="faculty" id="faculty" value="<?php echo $row->fid;?>">
                               <td style="width:150px"><button type="submit" value="Upload" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Remarks</button></td>

                               </form>


                               </td>
                               </tr>
                                 <?php } ?>
                               <?php } ?>

                            </tbody>
                           

                          </table>
              
        
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
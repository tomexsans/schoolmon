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
                        <a   href="<?php echo base_url();?>Admin"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>

                 
                     <li>
                        <a  href="<?php echo base_url();?>Admin/users"><i class="fa fa-desktop fa-3x"></i>Manage User</a>
                    </li>

                      <li>
                        <a  href="<?php echo base_url();?>Admin/college"><i class="fa fa-rocket fa-3x"></i>Department</a>
                    </li>

                     <li>
                        <a  href="<?php echo base_url();?>Admin/faculty"><i class="fa fa-suitcase fa-3x"></i> Faculty</a>
                    </li>
                     <li>
                        <a  href="<?php echo base_url();?>Admin/rooms"><i class="fa fa-folder-open fa-3x"></i> Rooms & Schedule</a>
                    </li>

                    <li>
                        <a  href="<?php echo base_url();?>Admin/section"><i class="fa fa-list-ol fa-3x"></i> Section</a>
                    </li>

                    <li >
                        <a  class="active-menu" href="<?php echo base_url();?>Admin/logs"><i class="fa fa-edit fa-3x"></i>&nbsp;&nbsp;Logs</a>
                    </li> 
                         <li >
                        <a   href="<?php echo base_url();?>Admin/reports"><i class="fa fa-bar-chart-o fa-3x"></i>&nbsp;&nbsp;Reports</a>
                    </li>
                    <li >
                        <a   href="<?php echo base_url();?>Admin/import file"><i class="fa fa-bar-chart-o fa-3x"></i>Import File</a>
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
                     <h2>Log Records</h2>   
                        
                    </div>
                </div>              
                      
                <hr />                
                                  <table class="table ">
                        <thead>
                            <tr>
                             
              
                            <th>User</th>
                            <th>Date and Time </th>                        
                            <th>Status</th>

                            <th></th>
                      
                      
                            </tr>

                            </thead>
                            <tbody>
                             
                               <tr>
                               <?php if($logs){$CI =& get_instance(); ?> 


                               <?php foreach ($logs as $row) {?>
                               <td><?php echo $CI->whois($row->userid); ?></td>
                               <td><?php echo $row->logdatetime; ?></td>
                               <td><?php echo $row->status; ?></td>
                               <td></td>
                               </tr>
                                 <?php } ?>
                               <?php } ?>

                            </tbody>
                           

                          </table>
                          <table class="table table-bordered">
                           <!--<h4 class="pull-right" style="margin-left:-250px;"><strong>Total Amount : </strong><?php echo $sum;?></h4>
                            -->
                          </table>      
                         
                          <p></p>
                          <p></p>
                          <hr>

             
              
        
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
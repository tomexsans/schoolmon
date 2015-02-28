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
                        <a   href="javascript:history.go(-1)"><i class="fa fa-arrow-left fa-3x"></i> Back</a>
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
                     <h2>Set status confirmation</h2>   
                      
                    </div>
                </div>              
                      
                <hr />                
                            
                             <?php
                        if (!validation_errors()=="")
                            { 
                            echo    '<div class="form-group">'.
                                    '<label class>'.validation_errors().'</label>'.
                                    '</div>';
                    
                            }
                        ?></small>
                <div class="row">
                    <div class="col-lg-5">
                             <form class="form-signin" method="post" action="<?php echo base_url();?>checker/savedtr">       

                        

                             
                                   <div class="form-group">
                                             <label>FACULTY : <?php echo $tostored['fidname']; ?></label><br>
                                             <label>DAY     : <?php echo $tostored['day']; ?>  </label><br>
                                             <label>TIME     : <?php echo $tostored['time']; ?>  </label><br> 
                                             <label>ROOM    : <?php echo $tostored['room']; ?>  </label><br> 
                                             <label>STATUS  : 
                                             <select id="status" name ="status" class="form-control">
                                                         
                                            <option>ABSENT</option>
                                            <option>LATE</option>
                                            <option>PRESENT</option>

                                           </select></label><br>
                                            <input type="hidden" name="room" id="room" value="<?php echo $tostored['room'];?>">
                                            <input type="hidden" name="day" id="day" value="<?php echo $tostored['day'];?>">
                                             <input type="hidden" name="time" id="time" value="<?php echo $tostored['time'];?>">
                                             <input type="hidden" name="period" id="period" value="<?php echo $tostored['period'];?>">
                                            <input type="hidden" name="faculty" id="faculty" value="<?php echo $tostored['fid'];?>">
                                            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="remarks">
                                                        
                                    </div>

                                    <button class="btn btn-md btn-danger " type="submit">Save</button> 
                                
                         </form>
              
        
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
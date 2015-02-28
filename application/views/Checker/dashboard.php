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

                    <?php foreach ($college as $row) { ?>    
                     <li>
                        <a   href="<?php echo base_url()?>checker/college/<?php echo $row->cid; ?>"><i class="fa fa-star fa-2x"></i> <?php echo $row->ccode; ?></a>
                    </li>
                    <?php } ?>

                        


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
                     <h2>Checker Dashboard</h2>   
                        <h5>Welcome  <?php echo ucfirst($this->session->userdata['logged_in']['firstname'] ); ?> &nbsp;<?php echo ucfirst($this->session->userdata['logged_in']['lastname'] ); ?>, Love to see you back. </h5>
                    </div>
                </div>              
                      
                <hr />                
               

              
        
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
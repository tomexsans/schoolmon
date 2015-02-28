<div id="wrapper">
  
        <!--Nav template -->
        <?php $this->load->view('template/sidebar');?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Change Password</h2>   
                        <h5>Welcome  <?php echo ucfirst($this->session->userdata['logged_in']['firstname'] ); ?> &nbsp;<?php echo ucfirst($this->session->userdata['logged_in']['lastname'] ); ?>, Love to see you back. </h5>
                    </div>
                </div>              
                      
                <hr />                
                <small>

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
                             <form class="form-signin" method="post" action="<?php echo base_url();?>admin/updatepassword/">       

                        

                             
 
                                    <label>Retype Password</label>
                                    <input type="password" class="form-control"  id="password" name="password" value="">
                                    <label>Retype Password</label>
                                    <input type="password" class="form-control"  id="password2" name="password2" value="">
                                    <br>
                                    
                                    
                                    <br>
                                    <button class="btn btn-md btn-danger " type="submit">Change my password</button> 
                                
                         </form>
                        
             </div>
             </div>
              
        
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
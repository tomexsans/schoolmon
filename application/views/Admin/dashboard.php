<div id="wrapper">
  
        <!--Nav template -->
        <?php $this->load->view('template/sidebar');?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
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
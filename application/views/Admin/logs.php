<div id="wrapper">
  
        <!-- /. NAV TOP  -->
        <?php echo $this->load->view('template/sidebar');?>
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
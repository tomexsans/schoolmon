<div id="wrapper">
        <?php echo $this->load->view('template/checker_sidebar')?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" > 
            <?php if(isset($system_message)){ echo  $system_message;}?>
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
                               <input type="hidden" name="aabbcc" id="aabbcc" value="<?php echo $thecid;?>">
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
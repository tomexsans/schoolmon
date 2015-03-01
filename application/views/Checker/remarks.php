<div id="wrapper">
    <?php echo $this->load->view('template/checker_sidebar')?>  
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
                
                <?php if($is_checked):?>
                    <div class="alert alert-success"><strong><i class="fa fa-check"></i> Faculty is Already Checked.</strong></div>
                <?php endif;?>


                <div class="row">
                    <?php if($is_faculty AND $is_faculty->fid):?>    
                    <div class="col-lg-5">
                             <form class="form-signin" method="post" action="<?php echo base_url();?>checker/savedtr">       

                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <label>FACULTY : <?php echo $tostored['fidname']; ?></label><br>
                                             <label>DAY     : <?php echo $tostored['day']; ?>  </label><br>
                                             <label>TIME     : <?php echo $tostored['time']; ?>  </label><br> 
                                             <label>ROOM    : <?php echo $tostored['room']; ?>  </label><br> 

                                             <div class="form-group">
                                             <label>STATUS  : 
                                                 <select id="status" name ="status" class="form-control">             
                                                    <option>ABSENT</option>
                                                    <option>LATE</option>
                                                    <option>PRESENT</option>
                                                </select>
                                            </label><br>
                                            <input type="hidden" name="room" id="room" value="<?php echo $tostored['room'];?>">
                                            <input type="hidden" name="day" id="day" value="<?php echo $tostored['day'];?>">
                                             <input type="hidden" name="time" id="time" value="<?php echo $tostored['time'];?>">
                                             <input type="hidden" name="period" id="period" value="<?php echo $tostored['period'];?>">
                                            <input type="hidden" name="faculty" id="faculty" value="<?php echo $tostored['fid'];?>">
                                            <input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>">
                                            <input type="text" class="form-control" id="remarks" name="remarks" placeholder="remarks">
                                                        
                                    </div>
                                        <?php if($is_checked === false):?>
                                            <button class="btn btn-md btn-danger " type="submit">Save</button>
                                        <?php else:?>
                                            <div class="alert alert-success"><strong><i class="fa fa-check"></i> Faculty is Already Checked.</strong></div>                                    
                                        <?php endif;?>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <img src="<?php echo base_url('assets/uploads/files/'.$faculty_data->file_url)?>" style="width:150px">
                                        </div>
                                    </div>    
                    
                             
                                   
                                
                         </form>
              
        
    </div>
            <?php else:?>
                <div class="alert alert-warning"><strong>Notice.</strong> Faculty not found on database.</div>
            <?php endif;?>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
<div id="wrapper">
        <?php echo $this->load->view('template/checker_sidebar')?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" > 
            <?php if(isset($system_message)){ echo  $system_message;}?>
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2><?php print_r($col); ?></h2>

                      <select class="form-control" id="search-schedule">
                        <option value="All">All</option>
                      <?php
                      /*  $opt = '';
                        foreach ($time as $key => $value) {
                          $opt .= '<option value="'.$value->day.'<->'.$value->time.'">'.$value->day.' - '.$value->time.'</option>';
                        }
                      */

                        $days = array('Monday'=>'Monday',
                                 'Tuesday'=>'Tuesday',
                                 'Wednesday'=>'Wednesday',
                                 'Thursday'=>'Thursday',
                                 'Friday'=>'Friday',
                        );
                        foreach ($days as $key => $value) {
                          $opt .= '<option value="'.$key.'">'.$value.'</option>';
                        }

                        echo $opt;
                      ?>
                      </select>
                    </div>
                </div>              
                      
                <hr />                
                    <table class="table table-striped" id="search-table">
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

                               <?php 
                                $current_day = strtolower(date('l'));
                                foreach ($room as $row) {

                                @$stime = explode('-',$row->time);
                                @$timef = strtotime(@$stime[0]);
                                @$timet = strtotime(@$stime[1]);

                                $installed = $row->day !== '' ? explode(' ',$row->day) : [];
                                $days = array_map(function($e){
                                  return strtolower($e);
                                },$installed);
                                ?>
                               <td ><?php echo $row->roomcode?></td>
                               <td class="day"><?php echo $row->day;    ?></td>
                               <td class="time"><?php echo $row->time;    ?></td>
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
                               <input type="hidden" name="roomid" id="roomid" value="<?php echo $row->roomid;?>">
                               <td style="width:150px">
                               <?php if(in_array($current_day, $days)):?>
                                  <?php if(time() >= $timef AND time() <= $timet):?>
                                    <button type="submit" value="Upload" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Remarks</button>
                                  <?php else:?>
                                    <small>Remarks are closed</small>
                                  <?php endif;?>
                               <?php else:?>
                                    <small>Remarks are closed</small>
                               <?php endif;?>
                              </td>
                                
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
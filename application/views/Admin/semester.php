<div id="wrapper">
  
        <!--Nav template -->
        <?php $this->load->view('template/sidebar');?> 
        <!-- /. NAV SIDE  -->
<div id="page-wrapper" >
    <div id="page-inner">
            <?php echo isset($system_message) ? $system_message : null;?>
            <div class="row">
                <div class="col-md-12">
                    <h2>Show All Current Year/Semester</h2>   
                </div>
            </div> 
            <hr />   
            <div class="row">
                <div class="col-md-12">
                    <?php if($semesters):?>
                        <table class="table table-striped table-bordered">
                                <tr class="info">
                                    <td colspan="7" style="text-align:center">Found <label class="label label-success"><strong><?php echo count($semesters)?></strong></label> Records</td>
                                </tr>
                                <tr class="info">
                                    <td>#</td>
                                    <td>Name</td>
                                    <td>Year From</td>
                                    <td>Year To</td>
                                    <td>Notes</td>
                                    <td colspan="2"></td>
                                </tr>
                            <?php $count=1;foreach ($semesters as $key => $value) :?>
                                <tr>
                                    <td><?php echo $count;?></td>
                                    <td><?php echo $value->code;?></td>
                                    <td><?php echo $value->year_from;?></td>
                                    <td><?php echo $value->year_to;?></td>
                                    <td><?php echo $value->comment;?></td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="<?php echo site_url('admin/psemester/edit/'.$value->id)?>" class="btn btn-default"><i class="fa fa-pencil"></i></a>
                                            <a href="<?php echo site_url('admin/psemester/delete/'.$value->id)?>" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                        </div>
                                    
                                        <?php if($value->current == 0):?>
                                            <a href="<?php echo site_url('admin/psemester/current/'.$value->id)?>" class="btn btn-primary"><i class="fa fa-check"></i> Set Current</a>
                                        <?php else:?>
                                            <a href="#" class="btn btn-success disabled">Selected</a>
                                        <?php endif;?>
                                    </td>
                                </tr>
                            <?php $count++;endforeach;?>
                        </table>
                    <?php else:?>
                        <div class="alert alert-warning"><strong>Notice.</strong> No Data was retrieved.</div>
                    <?php endif;?>
                </div>

                <div class="col-md-6 col-lg-6">
                    <a href="<?php echo site_url('admin/psemester/new')?>" class="btn btn-block btn-primary"><i class="fa fa-plus"></i> Add New Year/Semester</a>
                </div>
            </div>                           
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<?php 
if($type == 'new'){
    $question = 'Add a new Year/Semester';
    $sbmt_name = 'new_year_semester';
    $url = site_url('admin/psemester/new');
    $D = (object)array('code'=>'','year_from'=>'','year_to'=>'','comment'=>'');
    $btn_class= 'btn btn-primary';
    $btn_val = 'Add New Year/Semester';
}elseif($type == 'edit'){
    $question = 'Change Year/Semester';
    $sbmt_name = 'edit_year_semester';
    $url = site_url('admin/psemester/edit/'.$dataid);
    $D = $semesters;
    $btn_class= 'btn btn-primary';
    $btn_val = 'Save Changes to Year/Semester';
}elseif($type == 'delete'){
    $question = 'Are You Sure You want to delete Year/Semester?';
    $sbmt_name = 'delete_year_semester';
    $url = site_url('admin/psemester/delete/'.$dataid);
    $D = $semesters;
    $btn_class= 'btn btn-danger';
    $btn_val = 'Yes, Delete Year/Semester';
}elseif($type == 'current'){
    $question = 'Are you sure you want to set Year/Semester as Current?';
    $sbmt_name = 'current_year_semester';
    $url = site_url('admin/psemester/current/'.$dataid);
    $D = $semesters;
    $btn_class= 'btn btn-success';
    $btn_val = 'Yes, Set Year/Semester as Current';
}
?>
<div id="wrapper">
    <!--Nav template -->
    <?php $this->load->view('template/sidebar');?> 
    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
        <div id="page-inner">
            <?php echo isset($system_message) ? $system_message : null;?>
            <div class="row">
                <div class="col-md-12">
                    <h2><?php echo $question;?></h2>
                </div>
            </div>             
            <hr />             
            <div class="row">

                <div class="col-md-12">
                    <form action="<?php echo $url?>" method="POST">
                        
                        <div class="form-group col-md-10 col-lg-10">
                            <label>Semester (required)</label>
                            <input value="<?php echo set_value('semestername',$D->code)?>" type="text" name="semestername" class="form-control" placeholder="Semster I.E First Sem, 1st Sem, 1st" required>
                        </div>

                        <div class="form-group col-md-10 col-lg-10">
                            <label>Year From (required)</label>
                            <input value="<?php echo set_value('yearfrom',$D->year_from)?>" type="text" name="yearfrom" class="form-control" placeholder="2000" required maxlength="4">
                        </div>

                        <div class="form-group col-md-10 col-lg-10">
                            <label>Year to (required)</label>
                            <input value="<?php echo set_value('yearto',$D->year_to)?>" type="text" name="yearto" class="form-control" placeholder="2000" required maxlength="4">
                        </div>

                        <div class="form-group col-md-10 col-lg-10">
                            <label>Comments (optional)</label>
                            <textarea class="form-control" name="yearsem_comment"><?php echo set_value('yearsem_comment',$D->comment)?></textarea>
                        </div>

                        <div class="form-group col-md-10 col-lg-10">
                            <?php if($type == 'delete'):?>
                                <p style="color:#f00"><strong>Warning.</strong> You are about to delete a data. This action cannot be undone.</p>
                            <?php endif;?>
                            <input type="submit" class="<?php echo $btn_class?>" name="<?php echo $sbmt_name?>" value="<?php echo $btn_val?>">
                            <a href="#" onclick="window.history.go(-1); return false;" class="btn btn-default"><i class="fa fa-chevron-left"></i>&nbsp;&nbsp;Cancel &amp; Go Back</a>
                        </div>

                    </form>
                </div>
            </div>       
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
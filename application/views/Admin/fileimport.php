<div id="wrapper">
         <!--Nav template -->
        <?php $this->load->view('template/sidebar');?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">

        <?php if(isset($system_message)) echo $system_message;?>

        <?php if($type == 'delete' OR $type == 'show'):?>
            
            <div class="row">
                    <div class="col-md-12">
                     <h2>Show CSV file</h2>   
                        <ul style="list-style:none">
                            <li>Showing CSV file with filename <strong><?php echo $data->uploaded?></strong></li>
                            <li>Uploaded BY: <strong><?php echo $data->uploaded_by_name?></strong></li>
                            <li>Uploaded ON: <strong><?php echo $data->created_at?></strong></li>
                            <li>Importe status: <strong><?php echo $data->imported == 1 ? 'File already Imported' : 'File not Imported';?></strong></li>
                        </ul> 
                    </div>
                </div> 
            <?php if($csv):?>
            <table class="table table-striped table-bordered">
                <?php foreach ($csv as $key => $value):$counter = count($value)-1; ?>
                    <tr>
                        <?php for ($i=0; $i < $counter; $i++):?>
                            <td><?php echo $value[$i];?></td>
                        <?php endfor;?>
                    </tr>
                <?php endforeach ?>
            </table>

            <?php else:?>
                <div class="alert alert-notive"> No data to show</div>
            <?php endif;?>


            <?php if($type == 'delete'):?>
                <form action="<?php echo site_url('admin/fileimport/'.$type.'/'.$data->id );?>" method="POST">
                    <label style="color:#f00">You are about to delete a data, this cannot be undone.</label><br>
                    <input type="hidden" value="<?php echo $data->id?>">
                    <input type="submit" name="delete_csv_file" value="Yes, Continue and Delete CSV File" class="btn btn-danger btn-lg">
                </form>
            <?php endif;?>

        <?php elseif($type == 'import'):?>
            
                <div class="row">
                    <div class="col-md-12">
                     <h2>Admin Dashboard</h2>   
                        <h5>Welcome  <?php echo ucfirst($this->session->userdata['logged_in']['firstname'] ); ?> &nbsp;<?php echo ucfirst($this->session->userdata['logged_in']['lastname'] ); ?>, Love to see you back. </h5>
                    </div>
                </div>              
                      
                <hr /> 
                
                <?php if(isset($uploaderrors)) echo '<small style="color:#f00">'.$uploaderrors.'</small>';?>

                <form action="<?php echo site_url('admin/fileimport');?>" method="POST" enctype="multipart/form-data">
                    <input type="file" name="userfile">
                    <br>
                    <input type="submit" name="importschedule" value="Upload Selected File" class="btn btn-primary">
                </form>


                <hr>
                
                <?php if($imports):?>
                    <h1>Schedules Import (<?php echo count($imports)?>)</h1>
                    <table class="table table-striped">
                        <tr class="success">
                            <td>#</td>
                            <td>File Name</td>
                            <td>Uploaded By</td>
                            <td>Uploaded At</td>
                            <td style="text-align:center">Imported</td>
                            <td></td>
                        </tr>
                        <?php $count = 1;foreach ($imports as $key => $value):?>
                            <tr>
                                <td><?php echo $count;?></td>
                                <td><strong><?php echo $value->uploaded?></strong></td>
                                <td><?php echo $value->uploaded_by_name?></td>
                                <td><?php echo $value->created_at?></td>
                                <td style="text-align:center">
                                        
                                    <?php if($value->imported == 0):?>
                                        <i class="fa fa-times fa-2x"></i>
                                    <?php else:?>
                                        <i class="fa fa-check fa-2x"></i>
                                    <?php endif;?>

                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="<?php echo site_url('admin/import_schedule');?>" class="import-data btn btn-primary" data-id="<?php echo $value->id?>" data-filename="<?php echo $value->uploaded?>" data-imported="<?php echo $value->imported?>">Import Schedule</a>
                                        <a href="<?php echo site_url('admin/fileimport/show/'.$value->id);?>" class="btn btn-success">show</a>
                                        <a href="<?php echo site_url('admin/fileimport/delete/'.$value->id);?>" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        <?php $count++;endforeach;?>

                    </table>
                <?php else:?>
                    <div class="alert alert-warning">No Uploaded Schedules Found.</div>
                <?php endif;?>
            
        <?php endif;?>
        </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->

<!-- Modal -->
<div id="importmodal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <p>Are You Sure You Want to import File to schedule?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button id="continue" type="button" class="btn btn-primary">Yes Import File</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
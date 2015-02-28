<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
<?php 
foreach($css_files as $file): ?>
  <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_files as $file): ?>
  <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>
<style type='text/css'>
body
{
  font-family: Arial;
  font-size: 14px;
}
a {
    color: blue;
    text-decoration: none;
    font-size: 14px;
}
a:hover
{
  text-decoration: underline;
}
</style>
</head>
<body>
<div id="wrapper">
  
        <?php $this->load->view('template/sidebar');?> 
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Manage Users</h2>   
                       
                    </div>
                </div>              
                      
                <hr />                
               
                  <?php echo $output; ?>
  <!-- <a class="DTTT_button ui-button ui-state-default DTTT_button_print" id="ToolTables_54e2e663de1da_1" title="View print view"><span>Print</span></a>             -->
        
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->

<script type="text/javascript">
  $(document).ready(function(){
    $('.DTTT_container ').append('<a class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-primary" href="http://localhost:81/schoolmon/Admin/prints"><span class="ui-button-icon-primary ui-icon ui-icon-print"></span><span class="ui-button-text">Print Report</span></a>');
  });
  </script>
</body>
</html>

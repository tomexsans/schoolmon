<div id="wrapper">
    <!--Nav template -->
    <?php $this->load->view('template/sidebar');?> 

    <!-- /. NAV SIDE  -->
    <div id="page-wrapper" >
    <div id="page-inner">
    <div class="row">
    <div class="col-md-12">
    <h2>Reports</h2>   
    <form method="post" action="<?php echo base_url();?>admin/gen_reports">
    <label>From &nbsp; <input type="date" name="datestart" id="datestart"></label><label>&nbsp;To&nbsp;</label>
    <input type="date" name="dateend" id="dateend"> <button type="submit">Generate</button>
    </form>
    </div>
    </div>              

    <hr />                
    <?php if($reports!=NULL){ ?>
    <a href="<?php echo site_url('reports/dateFrom/'.$date1.'/'.$date2);?>" class="btn btn-primary btn-lg" target="_blank">Print Report</a>
    <h5><?php echo $report_title;?></h5>
    <table class="table ">
    <thead>
    <tr>
    <th>Room</th>
    <th>Faculty</th>
    <th>Time</th>
    <th>Status</th>
    <th>Remarks</th>
    <th></th>
    </tr>
    </thead>
    <tbody>
    <tr>

    <?php foreach ($reports as $row) {?>
    <?php $CI =& get_instance(); ?>
    <td><?php echo $row->roomcode; ?></td>
    <td><?php echo $CI->whois($row->fid); ?></td>
    <td><?php echo $row->day .'/' . $row->time; ?></td>
    <td><?php echo $row->status; ?></td>
    <td><?php echo $row->remarks; ?></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>
    <?php } ?>
    </div>
    <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
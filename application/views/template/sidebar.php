<?php $current_route = $this->router->method; ?>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
        <li class="text-center">
            <?php $profilepic = $this->session->userdata['logged_in']['profilepic']; ?>
            

            <?php if($profilepic!=NULL){ ?>
             <img src="<?php echo base_url();?>assets/uploads/files/<?php echo $profilepic;?>" class="img-responsive"/>   
            
            <?php }

            else{

            ?>    
             <img src="<?php echo base_url();?>assets/img/find_user.png" class="user-image img-responsive"/>   
            <?php 
              }
            ?>
            </li>
            <li>
                <a class="<?php echo $current_route == 'index' ? 'active-menu' : null ?>" href="<?php echo site_url('admin');?>"><i class="fa fa-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a class="<?php echo in_array($current_route,array('semester','psemester')) ? 'active-menu' : null ?>" href="<?php echo site_url('admin/semester');?>"><i class="fa fa-calendar"></i> Semester</a>
            </li>
            <li>
                <a class="<?php echo $current_route == 'users' ? 'active-menu' : null ?>" href="<?php echo site_url();?>Admin/users"><i class="fa fa-desktop"></i>Manage User</a>
            </li>

              <li>
                <a class="<?php echo $current_route == 'college' ? 'active-menu' : null ?>" href="<?php echo site_url();?>Admin/college"><i class="fa fa-rocket"></i>Department</a>
            </li>

             <li>
                <a class="<?php echo $current_route == 'faculty' ? 'active-menu' : null ?>" href="<?php echo site_url();?>Admin/faculty"><i class="fa fa-suitcase"></i> Faculty</a>
            </li>
             <li>
                <a class="<?php echo $current_route == 'rooms' ? 'active-menu' : null ?>" href="<?php echo site_url();?>Admin/rooms"><i class="fa fa-folder-open"></i> Rooms & Schedule</a>
            </li>

            <li>
                <a class="<?php echo $current_route == 'section' ? 'active-menu' : null ?>" href="<?php echo site_url();?>Admin/section"><i class="fa fa-list-ol"></i> Section</a>
            </li>

            <li >
                <a  class="<?php echo $current_route == 'logs' ? 'active-menu' : null ?>" href="<?php echo site_url();?>Admin/logs"><i class="fa fa-edit"></i>&nbsp;&nbsp;Logs</a>
            </li> 
            <li >
                <a  class="<?php echo $current_route == 'reports' ? 'active-menu' : null ?>" href="<?php echo site_url();?>Admin/reports"><i class="fa fa-bar-chart-o"></i>&nbsp;&nbsp;Reports</a>
            </li>
            <li >
                <a  class="<?php echo $current_route == 'fileimport' ? 'active-menu' : null ?>" href="<?php echo site_url();?>Admin/fileimport"><i class="fa fa-bar-chart-o"></i>Import File</a>
            </li>
            <li  >
                <a  class="<?php echo $current_route == '' ? 'active-menu' : null ?>" href="<?php echo site_url();?>verifylogin/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Sign Out</a>
            </li>   

        </ul>
    </div>
</nav>  
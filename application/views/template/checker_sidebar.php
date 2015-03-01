<?php $current_route = $this->router->method; ?>
<!-- /. NAV TOP  -->
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
<li><a class="<?php echo $current_route == 'index' ? 'active-menu' : null ?>"  href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
<li class="<?php echo $current_route == 'index' ? 'active-menu' : null ?>"><a   href="<?php echo base_url();?>" onclick="window.history.go(-1); return false;"><i class="fa fa-arrow-left"></i> Back</a></li>
  

<?php if(isset($college)):foreach ($college as $row): ?>    
    <li><a   href="<?php echo base_url()?>checker/college/<?php echo $row->cid; ?>"><i class="fa fa-star fa-2x"></i> <?php echo $row->ccode; ?></a></li>
<?php endforeach;endif; ?>

<li class="<?php echo $current_route == 'index' ? 'active-menu' : null ?>"><a   href="<?php echo base_url();?>verifylogin/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;Sign Out</a></li> 
</ul>


</div>
</nav>  
  <style type="text/css">
body {
  background: #eee !important;  
}

.wrapper {  
  margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0,0,0,0.1);  

  .form-signin-heading,
  .checkbox {
    margin-bottom: 30px;
  }

  .checkbox {
    font-weight: normal;
  }

  .form-control {
    position: relative;
    font-size: 16px;
    height: auto;
    padding: 10px;
    @include box-sizing(border-box);

    &:focus {
      z-index: 2;
    }
  }



  input[type="text"] {
    margin-bottom: -1px;
    border-bottom-left-radius: 0;
    border-bottom-right-radius: 0;
  }

  input[type="password"] {
    margin-bottom: 20px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
}

  </style>
  <div class="wrapper">
    <form class="form-signin" method="post" action="<?php echo base_url();?>verifylogin/process">       
      <p align="center"><img src="<?php echo base_url();?>assets/images/TSU.png" class="img-responsive" ></p>
      <p align="center"><h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Academic Monitoring System</h4></p>
      <hr>
      <div class="circle-image"></div>
      <div class="form-group">
      <label>Email</label>
      <input class="form-control" type="text" name="email" id="email">
      </div>  

      <div class="form-group">
      <label>Password</label>
      <input class="form-control" type="password" name="password" id="password">
      </div>     
    

       <?php
        if (!validation_errors()=="")
                    { 
                  echo '<label class>'.validation_errors().'</label>';
                        
                    
                      }
                                ?>

                                <div class="form-group">
   
      </div>    

      <button class="btn btn-lg btn-block btn-danger" type="submit"><i class="glyphicon glyphicon-log-in"></i> Login</button>
     
    </form>
  </div>
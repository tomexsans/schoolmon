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
      <h2 class="form-signin-heading">Rizal Online Learning</h2>
      <h3 class="form-signin-heading">You are now registered!</h3>
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
                  echo '<div class="form-group">'.
                        '<label class>'.validation_errors().'</label>'.
                        '</div>';
                    
                      }
                                ?>

                                <div class="form-group">
      
    
      </div>    
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button> 
      
    </form>
  </div>
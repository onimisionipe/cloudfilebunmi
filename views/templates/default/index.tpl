<div id="myCarousel" class="carousel slide" data-ride="carousel">
      
      <div class="carousel-inner">
        <div class="item active">
          <img src="images/slide3.jpg" alt="First slide">
          
            <div class="carousel-caption">
              <h1><?php echo $heading; ?></h1>
              Welcome to <?php echo $heading; ?>....<?php echo $author; ?><br/>
              <a class="btn btn-lg btn-primary" href="#register" role="button">Create Account</a>
            </div>
         
        </div>
        <div class="item">
          <img src="images/slide2.jpg" alt="Second slide">
          
            <div class="carousel-caption">
              <h1><?php echo $heading; ?></h1>
              Best UI/UX Design. Create account and <i>Explore</i><br/>
              <a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>
            </div>
          
        </div>
        <div class="item">
          <img src="images/slide1.jpg" alt="Third slide">
          
            <div class="carousel-caption">
              <h1><?php echo $heading; ?></h1>
              Best UI/UX Design. Create account and <i>Explore</i><br/>
              <a class="btn btn-lg btn-primary" href="#register" role="button">Create Account</a>
            </div>
          
        </div>
          
      </div>
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->
   <a name="login"></a> 
<hr/>

<?php if(!isset($logout)){

?>

<div class="container">

        <div class="row">
            
            <div class="col-md-7">
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src ="images/flatlock.png" /> 
            </div>
            <div class="col-md-5">
                
              <form name="login" action="login/login" method="post" class="form-signin login" role="form">
                  <h2 class="form-signin-heading">Please <span class="subtext">sign in</span></h2>
        <input type="email" name="email" class="form-control" placeholder="Email address" required><br/>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        
        <br/>
        <br/>
        <a href ="<?php echo HTTP_SERVER; ?>/recover">Forgot your password?</a> <br/><br/>
       
        
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>  
            </div>
        </div>
        
        <hr/>
       
           <div class="row">
            <div class="col-md-7">
                 <a name="register"></a>
                 <form name= "register" class="form-signin register" method="post" action="<?php echo $APP_URL; ?>/register/register" role="form">
                  <h2 class="form-signin-heading">Don't have an <span class="subtext">Account?</span></h2>
        <input type="text" class="form-control" name="fullname" placeholder="Full name" required><br/>
        <input type="text" class="form-control" name="location" placeholder="Location (State, city or country)" required><br/>
         <input type="email" class="form-control" name="email" placeholder="Email address" required><br/>
         <input type="text" class="form-control" name="identification_no" placeholder="Identification no (Matric or Staff no)" required><br/>
         <input type="text" class="form-control" name="token" placeholder="Secret Token" required><br/>
        <input type="password" class="form-control" name="password" placeholder="Password" required>
        
        <br/>
        
        <button class="btn btn-lg btn-primary btn-block chncolor" type="submit">Create Account</button>
      </form>  
                
            </div>
            <div class="col-md-5"><br/><br/>
             &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src ="images/register.png" /> 
            </div>
        </div>



</div>
<?php } 

?>

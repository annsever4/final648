
<!--- LOG IN TEST
	exampleInputEmail is the where to input the username
	exmapleInputpassword is password 
	submit should run a functions to push new user into database

// --> 


<form action="<?php echo URL; ?> loginpage/loginRegisteredUser"  style="margin-bottom:15%" method="post">

  <div class="row">
  <div class="col-md-4 col-md-offset-4 form-group" style="color:#FFFFFF">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email_input" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  </div>

  <div class="row">
  <div class="col-md-4 col-md-offset-4 form-group" style="color:#FFFFFF">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password_input" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  </div>

  <div class="center" style="padding-top:10px">
  <button type="submit" class="btn btn-default">Login</button>
  </div>
</form>

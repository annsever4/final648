<!--- Registration TEST
	exampleInputEmail is the where to input the username
	exmapleInputpassword is password
	submit should run a functions to push new user into database

// -->



 <!--  <form class="form-inline"> --> 
<form action="<?php echo URL; ?>registration/registerNewUser" method="post">



<div class="row">
    <div class="col-md-4 col-md-offset-4" style="color:#ffffff; max-width:20%;">
    <label for="first_name">First Name</label>
    <input type="text" name="user_first_name" class="form-control" id="first_name" placeholder="Jane">
    </div>

    <div class="col-md-4 " style="color:#ffffff; max-width:20%;">
    <label for="last_name">Last Name</label>
    <input type="text" name="user_last_name" class="form-control" id="last_name" placeholder="Doe">
    </div>
</div>


    <div class="row">
    <div class="col-md-4 col-md-offset-4" style="color:#ffffff; max-width:30%;">
    <label for="phone_number">Phone Number #</label>
    <input type="text" name="user_phone_number" class="form-control" id="phone_number" placeholder="(##) ###-####">
    </div>
    </div>

    <div class="row">
    <div class="col-md-4 col-md-offset-4" style="color:#FFFFFF; max-width: 30%;">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    </div>

    <div class="row">
    <div class="col-md-4 col-md-offset-4" style="color:#FFFFFF; max-width:30%;">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="user_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    </div>


    <div class="row">
    <div class="col-md-4 col-md-offset-4" style="color:#FFFFFF; max-width:30%;">
        <label for="exampleInputPassword2">Retype Password</label>
        <input type="password" name="user_password_repeat" class="form-control" id="exampleInputPassword2" placeholder="Password">
    </div>
    </div>

    <div class="center" style="padding-top:10px">
    <button type="cancel" class="btn btn-default">Cancel</button>
    <button type="submit" class="btn btn-default">Register</button>
    </div>
</form>

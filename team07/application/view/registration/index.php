<!--- Registration TEST
	exampleInputEmail is the where to input the username
	exmapleInputpassword is password
	submit should run a functions to push new user into database

// -->


<form  action="<?php echo URL; ?>registration/registerNewUser" method="post">
    <div class="form-group" style="color:#FFFFFF">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="user_email" class="form-control" id="exampleInputEmail1" placeholder="Email">
    </div>
    <div class="form-group" style="color:#FFFFFF">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="user_password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group" style="color:#FFFFFF">
        <label for="exampleInputPassword2">Retype Password</label>
        <input type="password" name="user_password_repeat" class="form-control" id="exampleInputPassword2" placeholder="Password">
    </div>

    <button type="submit" class="btn btn-default">Login</button>
</form>
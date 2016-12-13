<?php //session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title class="center">Team 007 - Vertical Prototype</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->
    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCP0FlO1B2ZZC5srVzlzpnnPjgZy2GysrQ'></script>
    <!-- Latest compiled and minified CSS, from CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">



</head>



<div class="c" id="main_background" ><!-- start of global container -->
    <!-- logo -->
 
    <div class="row flex"> 
	 <div class="col-md-12">
	   <div class="row" id="flex"> 
	    <div class="col-md-4" id="logo"><img id="logo" src="https://mgtvsportzedge.files.wordpress.com/2014/11/sfsu-gators.png"></div>
	   
	    <div class="col-md-4 center">
    		<h1 class="text_color_white" id="gatorlodge" style="font-size:50px">
		<a href="<?php echo URL; ?>proto">Gator Lodge</a>	
    	        </h1>
  	    </div>
	   
	     <div class="col-md-1 text-right" id="pills" style="margin-top:3%">
             <?php



             if(isset($_SESSION['logged_in'])){


                 echo "<a  href = " .URL. "logoutpage class='btn btn-primary btn-block btn-lg active' style='background:#FFFF;' role='button' aria-pressed='true'>Logout</a>";
             }


             else {

                 echo "<a href=" .URL. "loginpage class='btn btn-primary btn-block btn-lg active' style='background:#000000; color:#FFFF;' role='button' aria-pressed='true'>Login</a>";

             }
             ?>

         </div>

           <div class= "col-md-1 test-right" id = "pills" style="margin-top:3%">
             <a  href="<?php echo URL; ?>registration" class="btn btn-primary btn-lg btn-block active" style="background:#000000;" role="button" aria-pressed="true">Register</a>
           </div>

            </div>
           </div>
         </div>
    </div>

</div>


<!--- test div -->

<!-- navigation -->
<!--
<div class="navigation fill-height" id="secondary_background">
<a href="<?php echo URL; ?>">home</a>
    <a href ="<?php echo URL; ?>proto">Vertical Prototype</a>
</div>

//-->
<div class="fill-height center" style="background-color:#ffffff;">
	<ul class="nav navbar-nav" style="font-size:20px;">
	<li id="pills"><a href="<?php echo URL; ?>proto">Home</a></li>
        <li id="pills"><a href="<?php echo URL; ?>addlisting">Add a Listing</a></li>
        <li id="pills"><a href="<?php echo URL; ?>profile">My Page</a></li>
	</ul>
</div>

	<div style="float:right">
	<form class="navbar-form" id="black_text" style="" action="<?php echo URL; ?>proto/searchlisting" method="POST">
          <input class="form-control " type="text" name="key"  placeholder="Enter city or zipcode..." required >
          <input class="btn btn-success" style="margin:0" type="submit" name="submit_search" value="Search"/>
        </form>
	</div>
<hr>	

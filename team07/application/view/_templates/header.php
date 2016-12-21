<?php //session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title class="center">Team 007 - Vertical Prototype</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="<?php echo URL;?>js/nav-bar-active.js"></script>


    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyCP0FlO1B2ZZC5srVzlzpnnPjgZy2GysrQ'></script>
    <!-- Latest compiled and minified CSS, from CDN -->

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



    <!-- CSS -->
    <link href="<?php echo URL; ?>css/style.css" rel="stylesheet">
    <link href="<?php echo URL; ?>css/common_styles.css" rel="stylesheet">



</head>



<div class="c" id="main_background" ><!-- start of global container -->
    <!-- logo -->
 
    <div class="row flex"> 
	 <div class="col-md-12">
	   <div class="row" id="flex"> 
	    <div class="col-md-4 col-lg-4 col-sm-6 inline-block" id="logo"><img class="img-responsive" id="logo" style=""  src="https://mgtvsportzedge.files.wordpress.com/2014/11/sfsu-gators.png"></div>
	   
	    <div class="col-md-4 col-lg-4 col-sm-6">
    		<h1 class="text_color_white" id="gatorlodge" style="font-size:50px">
		<a href="<?php echo URL; ?>proto">Gator Lodge</a>	
    	        </h1>
  	    </div>


	     <div class="col-md-3 col-lg-3 col-sm-3 col-md-offset-1" id="pills" style="margin-top:3%">



             <?php



             if(isset($_SESSION['logged_in'])){


                 echo "<a  href = " .URL. "logoutpage class='btn btn-primary equal-size btn-lg active' style='background:#6D32B0;' role='button' aria-pressed='true'>Logout</a>";
             }


             else {

                 echo "<a href=" .URL. "loginpage class='btn btn-primary equal-size  btn-lg active' style='background:#6D32B0; color:#f4d942;' role='button' aria-pressed='true'>Login</a>";

             }
             ?>




             <a  href="<?php echo URL; ?>registration" class="btn equal-size btn-primary btn-lg active" style="background:#f4d942; color:#6D32B0" role="button" aria-pressed="true">Register</a>



         </div>
    </div>

</div>

        <script src="<?php echo URL; ?>js/eql-btn.js"></script>

        <!--- test div -->

<!-- navigation -->
<!--
<div class="navigation fill-height" id="secondary_background">
<a href="<?php echo URL; ?>">home</a>
    <a href ="<?php echo URL; ?>proto">Vertical Prototype</a>
</div>

//-->

</div>

            <div class = "row" id ="flex">

                <div class = "col-md-12">
                <div class = "col-md-4 col-md-offset-1" id = "tabs">
<div class="fill-height text-left" style="background-color:#ffffff;">
	<ul class="nav nav-pills green_pill" style="font-size:20px;">
	    <li id="Home-Pill"><a data-toggle="pills" href="<?php echo URL; ?>proto">Home</a></li>
        <li id="Add-Listing-Pill"><a data-toggle="pills" href="<?php echo URL; ?>addlisting">Add a Listing</a></li>
        <li id="My-Page-Pill"><a data-toggle="pills" href="<?php echo URL; ?>profile">My Page</a></li>
	</ul>
</div>

        </div>


	<div class = "col-md-4 col-md-offset-3 center">
	<form class="navbar-form" id="black_text" style="margin-right: 5.5%;" action="<?php echo URL; ?>proto/searchlisting" method="POST">
          <input class="form-control" id="header_search_bar" type="text" name="key"  placeholder="Enter city or zipcode..." required >
          <input class="btn btn-success" style="margin:0" type="submit" name="submit_search" value="Search"/>
        </form>
            </div>
                </div>
                </div>

    <script src="<?php echo URL;?>js/nav-bar-active.js"></script>
<hr>	


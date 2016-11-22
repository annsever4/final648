<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro    ssorigin="anonymous">



<div class="fill-height" id="secondary_background">
    <!-- <h3 class="text_color_white"style="padding-top:30px"> Find your new home ... </h3> -->

   <div id="fancy-border">
    <form class="form-inline" id="black_text" action="<?php echo URL; ?>proto/searchlisting" method="POST">
        <input class="form-control " style="width:30%" type="text" name="key"  placeholder="Search location..." required >
        <input class="btn btn-success" type="submit" name="submit_search" value="Search"/>
        <select name="slt_sort_by">
            <option value="price">Price</option>
            <option value="id">Listing ID</option>
        </select>
    </div>
  <!-- 
    <br /><b><u>NOTE</u>!</b> We only have 2 apartments in DB,
    <br />search by any character from its addresses:<br />
    <br />566 46th Ave
    <br />362 43rd Ave
    <br />I am logged in
  //-->

</div>

<!-- Output  Test -->


<?php if(isset($apartments)) { ?>



    <div class="row" style="display:flex">

	<!-- ========== NAV BAR BLOCK =========== -->
	    <div class="col-md-3" id="fancy-border" style="padding-top:0; margin-left:15px;display:flex;">
	    	<div class="left-navigation" style="color:#330033;background-color:#FFFFFF">
			    <ul style="list-style-type: none;">
				<li style="font:bold;font-size:25px"> Listings Type </li>	
				<li><input type="checkbox">Apartments</li>
				<li><input type="checkbox">Houses</li>
				<li><input type="checkbox">Room</li>
				<li style="font:bold;font-size:25px"> Price Range </li>
		<div class="row">
			<div class="col-md-4 form-group" style="color:#ffffff; max-width:40%;">
			<label for="first_name">Min</label>
			<input type="text" name="min_price" class="form-control" id="min_price" placeholder="min">
			</div>

			<div class="col-md-4 form-group" style="color:#ffffff; max-width:40%;">
			<label for="last_name">max</label>
			<input type="text" name="max_price" class="form-control" id="max_price" placeholder="max">
			</div>
		</div>
				
			<li style="font:bold;font-size:25px"> Amenities </li>
			<li><input type="checkbox">Laundry On-Site</li>		
			<li><input type="checkbox">Utilities</li>
			<li><input type="checkbox">Private Room</li>
			<li style="font:bold;font-size:25px"> Pets </li>
			<li><input type="checkbox">Cat</li>
			<li><input type="checkbox">Dogs</li>		
		        </ul>
	        </div>
	    </div>
	
        </form>
	<!-- END OF LEFT NAV -->
	<!-- =============== END NAV BAR BLOCK =============== -->
<div class="container" style="background:#FFFFFF;margin:0;">

<hgroup class="mb20">
<h2 class="lead"><strong class="text-danger">#number</strong> results were found for the search for <strong class="text-danger">SearchTexts</strong></h2>
</hgroup>

<?php foreach ($apartments as $apartment) { ?>
	<section class="col-xs-12 col-sm-6 col-md-12">
		<article class="search-result row">
			<div class="col-xs-12 col-sm-12 col-md-4">
			<a href="#" title="Lorem ipsum" class="thumbnail">
			<?php if (isset($apartment->image)) { ?>
                        <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($apartment->image).
                        '"max-height="300px" max-width="300px"/>' ?>
                        <?php } ?>
			</a>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-2">
			</div>

			<div class="col-xs-12 col-sm-12 col-md-7 excerpet">
			<h3 style="margin-top:0px"><a href="#" title="address" style="width:96%"><?php if (isset($apartment->address)) echo htmlspecialchars($apartment->address, ENT_QUOTES, 'UTF-8'); ?></a></h3>

			<span class="plus"><a href="#" title="bed" style="width:23%">Beds</i></a></span>
			<span class="plus"><a href="#" title="bath" style="width:23%">Baths</a></span>
			<span class="plus"><a href="#" title="size" style="width:23%"> Sq. Ft.</a></span>
			<span class="plus"><a href="#" title="message" style="width:25%"><i class="glyphicon glyphicon-envelope">  Message</i></a></span>			
			<p> Additional Details</p>
				
			</div>
		<span class="clearfix borda"></span>
		</article>
	</section>
<?php } ?>
</div>
	
	    

		<!-- ===================== START OF TABLE ================== -->
		    <!-- ============= TABLE ROW ============= -->
	<!-- START LISTINGS DISPLAY --> 
	<!-- END OF LISTINGS DISPLAY -->
    <!--================= END OF TABLE ================== --> 
<?php } ?>

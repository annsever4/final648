<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro    ssorigin="anonymous">

<style>
    #nav-font{
     font-size:15px;
    }

</style>

<div class="fill-height" id="secondary_background">
    <!-- <h3 class="text_color_white"style="padding-top:30px"> Find your new home ... </h3> -->

   <div id="fancy-border">
    <form class="form-inline" id="black_text" action="<?php echo URL; ?>proto/searchlisting" method="POST">
        <input class="form-control " style="width:30%" type="text" name="key"  placeholder="Enter city or zipcode..." required >
        <input class="btn btn-success" type="submit" name="submit_search" value="Search"/>
        <select name="slt_sort_by">
            <option value="price">Price</option>
            <option value="id">Listing ID</option>
        </select>
    </div>
</div>



<!-- Output  Test -->


<?php if(isset($apartments)) { ?>
    <div class="row" style="display:flex">

	<!-- ========== NAV BAR BLOCK =========== -->
	    <div class="col-md-3" id="fancy-border" style="padding-top:0; margin-left:15px;">
	    	<div class="left-navigation" style="color:#330033;background-color:#FFFFFF">
			    <ul style="list-style-type: none;">

				<hr>
				<li style="font:bold;font-size:30px;margin-top:20px; margin-bottom:10px"> Listings Type </li>	
				<li id="nav-font"><input name="is_apartment" type="checkbox">Apartments</li>
				<li id="nav-font"><input name="is_house" type="checkbox">Houses</li>
				<li id="nav-font"><input name="is_room" type="checkbox">Room</li>

				<hr>	
				<li style="font:bold;font-size:30px; margin-bottom:10px"> Price Range </li>
		<li class="row">
			<div class="col-md-4 form-group" style="color:#ffffff; max-width:40%;">
			<input type="text" name="min_price" class="form-control" id="min_price" placeholder="min">
			</div>
			<div class="col-md-2" style="font-size:30px">to</div>
			<div class="col-md-4 form-group" style="color:#ffffff; max-width:40%;">
			<input type="text" name="max_price" class="form-control" id="max_price" placeholder="max">
			</div>
		</li>
			<hr>	
			<li style="font:bold;font-size:30px; margin-bottom:10px"> Amenities </li>
			<li id="nav-font"><input name="laundry_on_site" type="checkbox">Laundry On-Site</li>
			<li id="nav-font"><input name="utilities_included" type="checkbox">Utilities</li>
			<li id="nav-font"><input name="private_room" type="checkbox">Private Room</li>
			
			<hr>
			<li style="font:bold;font-size:30px; margin-bottom:10px"> Pets </li>
			<li id="nav-font"><input name="cats_ok" type="checkbox">Cat</li>
			<li id="nav-font"><input name="dogs_ok" type="checkbox">Dogs</li>
			<hr>	
		        </ul>
	        </div>
	    </div>
	
        </form>
	<!-- END OF LEFT NAV -->
	<!-- =============== END NAV BAR BLOCK =============== -->
<div class="container" style="background:#FFFFFF;margin:0;">

<hgroup class="mb20">
<h2 class="lead"><strong class="text-danger"><?php echo count($apartments);?></strong> results were found for the search for <strong class="text-danger"><?php echo $key ?></strong></h2>
</hgroup>

<?php foreach ($apartments as $apartment) { ?>
<div id="messageModal_<?php echo $apartment->id; ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Send Message</h4>
            </div>
            <form method="POST" onsubmit="newConversationMessage(this);return false;">
                <div class="modal-body form-group">
                    <textarea class="form-control" name="message" id="message" placeholder="Type your message here..." rows="4"></textarea>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg btn-success pull-right" type="submit" name="submit">
                        <i class="glyphicon glyphicon-send"></i> Send
                    </button>
                    <button type="button" class="btn btn-default hide" data-dismiss="modal" name="close" id="close">Close</button>
                </div>
                <input type="hidden" name="recipient_id" id="recipient_id" value="<?php echo $apartment->id; ?>" />
            </form>
        </div>
    </div>
</div>

	<section class="col-xs-12 col-sm-6 col-md-12 border-col">
		<article class="search-result result_button row" id="<?php echo $apartment->id;?>">
			<div class="col-xs-12 col-sm-12 col-md-4">
			<a href="#" onclick="return false;" title="Lorem ipsum" class="thumbnail">
			<?php if (isset($apartment->image)) { ?>
                        <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($apartment->image).
                        '"max-height="300px" max-width="300px"/>' ?>
                        <?php } ?>
			</a>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-2">
			</div>

			<div class="col-xs-12 col-sm-12 col-md-7">
			<h3 style="margin-top:0px"><a href="#" onclick="return false;" title="address" style="width:96%"><?php if (isset($apartment->address)) echo htmlspecialchars($apartment->address, ENT_QUOTES, 'UTF-8'); ?></a></h3>

			<span class="plus"><a href="#" onclick="return false;" title="bed" style="width:23%">$<?php if (isset($apartment->price)) echo htmlspecialchars($apartment->price, ENT_QUOTES, 'UTF-8'); ?> </i></a></span>
			<span class="plus"><a href="#" onclick="return false;" title="bath" style="width:23%"><?php if (isset($apartment->bed_rooms)) echo htmlspecialchars($apartment->bed_rooms, ENT_QUOTES, 'UTF-8'); ?> Bedrooms</a></span>
			<span class="plus"><a href="#" onclick="return false;" title="size" style="width:23%"><?php if (isset($apartment->square_feet)) echo htmlspecialchars($apartment->square_feet, ENT_QUOTES, 'UTF-8'); ?> Sq. Ft.</a></span>
			<span class="plus"><a href="#" onclick="return false;" title="message" style="width:25%" data-toggle="modal" data-target="#messageModal_<?php echo $apartment->id; ?>"><i class="glyphicon glyphicon-envelope"> Contact</i></a></span>
				
			</div>
		<span class="clearfix borda"></span>
		</article>
	</section>
<?php } ?>
</div>

	<!-- START LISTINGS DISPLAY --> 

    <!--================= END OF TABLE ================== --> 
<?php } ?>

		<script>
			document.getElementById('header_search_bar').value = "<?php echo $key;?>";
		</script>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro    ssorigin="anonymous">



<div class="fill-height" id="secondary_background">
    <!-- <h3 class="text_color_white"style="padding-top:30px"> Find your new home ... </h3> -->


	<!-- TODO CHECKBOX INPUTS MUST BE APART OF THE FORM BELOW THIS LINE SO THAT THEY ARE STORED IN THE SUPER GLOBAL _POST -->
    <form class="form-inline" id="black_text" action="<?php echo URL; ?>proto/searchlisting" method="POST">
        <input class="form-control " style="width:30%" type="text" name="key"  placeholder="Search location..." required >
        <input class="btn btn-success" type="submit" name="submit_search" value="Search"/>
        <select name="slt_sort_by">
            <option value="price">Price</option>
            <option value="id">Listing ID</option>
        </select>
        //if the form is set  call request class to aqcuire _POST values

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


<!-- TODO THE INPUT CHECKBOXES BELOW MUST BE MOVED TO THE FORM ABOVE SO THAT THE ACTION SEARCH LISTING CAN RETRIEVE THEIR VALUES -->
    <div class="row" style="min-height:100%" id="fill_height">

	<!-- ========== NAV BAR BLOCK =========== -->
	    <div class="col-md-3" style="min-height:100%">
	    <div class="left-navigation" style=" height:100%;color:#330033;background-color:#FFFFFF">
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
	    <input type="text" name="max_price" class="form-control" id="max_price" placeholder=        //if the form is set  call request class to aqcuire _POST values
"max">
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
	<!-- =============== END NAV BAR BLOCK =============== -->


	
	    <div class="col-md-9">
	    <div class="box inline">
	    

		<!-- ===================== START OF TABLE ================== -->
		    <thead style="background-color: #ddd; font-weight: bold;">
		    <!-- ============= TABLE ROW ============= -->

		<div class="row">
		 
			<!-- <div class="col-md-4">Id</div> -->
			<div class="col-md-3"></div>
		    
		    <!-- ============= END TABLEROW ======== -->
	        </div>

			<!-- TODO THE TITLE OF THE LISTING NEEDS BE DISPLAYED ABOVE EACH RESULT -->
	    
    <?php foreach ($apartments as $apartment) { ?>
        <div class="row" style="margin:5px; background:#FFFFFF">
	    <div class="col-xs-6 col-sm-3" style="padding:2px">
                <?php if (isset($apartment->image)) { ?>
                    <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($apartment->image).
                        '"max-height="300px" max-width="300px"/>' ?>
                <?php } ?>
            </div>

<!--
	    <ul class="row nav nav-pills">
 	   <li class="col-md-3"><a href="#">Home</a>
	  <li class="col-md-3"><a href="#">Menu 1</a></li>
	  <li><a href="#">Menu 2</a></li>
	  <li><a href="#">Menu 3</a></li>
	</ul>

//-->
 		     
            <!-- <div style="color:blue;"><?php if (isset($apartment->id)) echo htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8'); ?></div> -->

  	           
	    <div class="col-xs-6 col-sm-3" id="listing-info"><?php if (isset($apartment->address)) echo htmlspecialchars($apartment->address, ENT_QUOTES, 'UTF-8'); ?> </div>
            <div class="col-xs-6 col-sm-3"  id="listing-info"><?php if (isset($apartment->price)) echo htmlspecialchars($apartment->price, ENT_QUOTES, 'UTF-8'); ?> </div>
	    <div class="col-xs-6 col-sm-3" id="listing-info">SQURE FEET</div>	    

	    	<div class="row">
		
            	<div class="col-xs-6 col-sm-3" id="listing-info"> BEDS </div>
 	    	<div class="col-xs-6 col-sm-3" id="listing-info"> BATHROOM </div>
            	<div class="col-xs-6 col-sm-3"id="listing-info"> EMAIL</div>
            	<div class="col-xs-6 col-sm-3"id="listing-info"> PHONE </div>
		</div>   	
        </div>

    <?php } ?>
		    </tbody>
		    </table>
    	    </div>
 	    </div>
    <!--================= END OF TABLE ================== --> 
<?php } ?>

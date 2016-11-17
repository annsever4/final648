<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro    ssorigin="anonymous">



<div class="fill-height" id="secondary_background">
    <!-- <h3 class="text_color_white"style="padding-top:30px"> Find your new home ... </h3> -->

    <form class="form-inline" id="black_text" action="<?php echo URL; ?>proto/searchlisting" method="POST">
        <input class="form-control " style="width:30%" type="text" name="key"  placeholder="Search location..." required >
        <input class="btn btn-success" type="submit" name="submit_search" value="Search"/>
        <select name="slt_sort_by">
            <option value="price">Price</option>
            <option value="id">Listing ID</option>
        </select>
    </form>

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



    <div class="row">

	<!-- ========== NAV BAR BLOCK =========== -->
	    <div class="col-md-3">
	    <div class="left-navigation" style="display:inline-block">
			    <ul style="list-style-type: none;">
				<h5><strong>WHEREABOUTS</strong></h5>
				<li><input type="checkbox">Home</li>
				<li><input type="checkbox">Office</li>
				<li><input type="checkbox">School</li>
				<li><input type="checkbox">Gym</li>
				<li><input type="checkbox">Art Class</li>
				<li><input type="checkbox">Hike Club</li>
			    </ul>
	    </div>
	    </div>
	<!-- =============== END NAV BAR BLOCK =============== -->


	
	    <div class="col-md-4 col-md-offset-4">
	    <div class="box inline">
	    <h3>Result</h3>

		<!-- ===================== START OF TABLE ================== -->
		    <table>
		    <thead style="background-color: #ddd; font-weight: bold;">
		    <!-- ============= TABLE ROW ============= -->
		    <tr>
			<td>Id</td>
			<td>Address</td>
			<td>Price</td>
			<td>Pictures</td>
		    </tr>
		    <!-- ============= END TABLEROW ======== -->

		    </thead>
		    <tbody>
	     
	    
    <?php foreach ($apartments as $apartment) { ?>
        <tr>
            <div><td><?php if (isset($apartment->id)) echo htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8'); ?></td></div>
            <td><?php if (isset($apartment->address)) echo htmlspecialchars($apartment->address, ENT_QUOTES, 'UTF-8'); ?> </td>
            <td><?php if (isset($apartment->price)) echo htmlspecialchars($apartment->price, ENT_QUOTES, 'UTF-8'); ?> </td>
            <td height="200" width="200">
                <?php if (isset($apartment->image)) { ?>
                    <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($apartment->image).
                        '"max-height="200" width="200"/>' ?>
                <?php } ?>
            </td>
    
        </tr>
    <?php } ?>
		    </tbody>
		    </table>
    	    </div>
 	    </div>
    <!--================= END OF TABLE ================== --> 
<?php } ?>

<?php 
	$allow_add = isset($_SESSION['logged_in']) ? "" : "onclick=\"alert('Please login first... for now :)');return false;\"";
?>

<br clear="all" />
<div style="border: double 3px red; padding: 30px;">
<?php 


		if (isset($_POST["submit"])) {
			echo "<pre>";
			echo $posting_id;
			echo "</pre>";
			/*
			if (isset($posting->file_body))
			echo '<img src="data:'.$posting->file_mime.';base64, '.base64_encode($posting->file_body).'" width="200" /><br />';
		$posting->file_body = "fooooooo :)";
			echo "<br /><pre>";
			echo var_dump($_POST);
			echo "</pre><br /><pre>";
			echo var_dump($posting);
			echo "</pre>";
			*/
		}

/*
if(isset($_POST["submit"])) {

	$source_file = $_FILES["fileUpload"]["tmp_name"];

	if(false !== $source_file) {
		$fs = file_get_contents($source_file);

		echo '<img src="data:image/png;base64, '.base64_encode($fs).'" width="200" />';
	} else {
		echo "Bad file or some error occured.";
	}


	// control test
	echo "<br /><hr/><br />";
	echo var_dump($_POST);
	echo "<br /><hr/><br />";
	echo var_dump($_FILES);

} // end big if
*/
?>
</div>


<div class="row container-fluid" id="profile-color">

<div class="col-xs-10 col-md-8 add-listing-body">


  <hr>
  <form action="<?php echo URL; ?>addlisting" method="post" enctype="multipart/form-data" class="form" id="registrationForm">





	<div class="form-group">
		<div class="col-xs-12">
			<label for="title"><h4>Property Listing Title</h4></label>
			<input type="text" class="form-control" name="title" id="title" placeholder="Make it nice and catchy!" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12">
			<label for="address"><h4>Property Address</h4></label>
			<input type="text" class="form-control" name="address" id="address" placeholder="Enter address here..." />
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<label for="price"><h4>Monthly Price</h4></label>
			<input type="text" class="form-control" name="price" id="price" placeholder="$ ???" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<label for="square_feet"><h4>Square Ft?</h4></label>
			<input type="text" class="form-control" name="square_feet" id="square_feet" placeholder="" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-4">
			<label for="zip"><h4>Zip code!</h4></label>
			<input type="text" class="form-control" name="zip" id="zip" placeholder="zip code" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<label for="move_in_date"><h4>Date Available?</h4></label>
			<input type="text" class="form-control" name="move_in_date" id="move_in_date" placeholder="when move in ready" />
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<label for="lease_end_date"><h4>Rent Duration?</h4></label>
			<input type="text" class="form-control" name="lease_end_date" id="lease_end_date" placeholder="how long" />
		</div>
	</div>
	<div class="col-xs-6">
		<div class="form-group">
			<div class="col-xs-1 checkbox">
				<input type="checkbox" value="1" selected name="private_room" id="private_room" />
			</div>
			<div class="col-xs-11">
				<label for="private_room"><h4>Private Room?</h4></label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-1 checkbox">
				<input type="checkbox" value="1" selected name="laundry_on_site" id="laundry_on_site" />
			</div>
			<div class="col-xs-11">
				<label for="laundry_on_site"><h4>Laundry on Site?</h4></label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-1 checkbox">
				<input type="checkbox" value="1" selected name="utilities_included" id="utilities_included" />
			</div>
			<div class="col-xs-11">
				<label for="utilities_included"><h4>Utilities Included?</h4></label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-1 checkbox">
				<input type="checkbox" value="1" selected name="dogs_ok" id="dogs_ok" />
			</div>
			<div class="col-xs-11">
				<label for="dogs_ok"><h4>Dogs Ok?</h4></label>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-1 checkbox">
				<input type="checkbox" value="1" selected name="cats_ok" id="cats_ok" />
			</div>
			<div class="col-xs-11">
				<label for="cats_ok"><h4>Cats Ok?</h4></label>
			</div>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="form-group">
			<div class="col-xs-7">
				<label for="property_type"><h4>Property Type</h4></label>
			</div>
			<div class="col-xs-5 selectdd">
				<select class="selectpicker" name="property_type" id="property_type">
					<option value="is_apartment">Entire Apartment</option>
					<option value="is_house" selected>Entire House</option>
					<option value="is_room">Just a Room</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-7">
				<label for="bed_rooms"><h4>Bedrooms</h4></label>
			</div>
			<div class="col-xs-5 selectdd">
				<select class="selectpicker" name="bed_rooms" id="bed_rooms">
					<option value="0">0</option>
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5+</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="col-xs-7">
				<label for="bathrooms"><h4>Number of Bathrooms</h4></label>
			</div>
			<div class="col-xs-5 selectdd">
				<select class="selectpicker" name="bathrooms" id="bathrooms">
					<option value="0">0</option>
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5+</option>
				</select>
			</div>
		</div>
	</div>

	<div class="form-group">
		<div class="col-xs-12">
			<label for="description"><h4>Additional Property/Rental Description</h4></label>
			<textarea class="form-control" name="description" id="description" placeholder="You can be as detailed as you like here..." rows="5"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-12">
			<label for="description"><h4>Photo Upload</h4></label>
			<input type="file" name="fileUpload" id="fileUpload" />
			<br />
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<button class="btn btn-lg btn-success pull-left" type="submit" name="submit" <?php echo $allow_add ?>>
				<i class="glyphicon glyphicon-ok-sign"></i> Submit
			</button>
		</div>
	</div>
	<div class="form-group">
		<div class="col-xs-6">
			<button class="btn btn-lg pull-right" type="reset">
				<i class="glyphicon glyphicon-repeat"></i> Reset
			</button>
		</div>
	</div>



</form>
</div>	

</div>


<style type="text/css">
.add-listing-body {
	float:none;
	margin:0 auto;
}
.selectdd {
	padding-top:10px;
}
.col-xs-1.checkbox {
	padding-left:0;
}
.checkbox input[type=checkbox] {
	position:static;
	margin-left:0;
}
</style>

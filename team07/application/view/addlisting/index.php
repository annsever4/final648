<div class="row container-fluid" id="profile-color">

<div class="tab-pane" id="settings">


  <hr>
  <form class="form" action="##" method="post" id="registrationForm">
      <div class="form-group">

	  <div class="col-xs-6">
	      <label for="address"><h4>Address</h4></label>
	      <input type="text" class="form-control" name="address" id="address" placeholder="Address" title="enter address if any.">
	  </div>
      </div>
      <div class="form-group">

	  <div class="col-xs-6">
	    <label for="price"><h4>Price</h4></label>
	      <input type="text" class="form-control" name="price" id="price" placeholder="Price" title="enter the price if any.">
	  </div>
      </div>

      <div class="form-group">

	  <div class="col-xs-6">
	      <label for="size"><h4>Size(Square Foot)</h4></label>
	      <input type="text" class="form-control" name="size" id="size" placeholder="Size of Room" title="enter room size number if any.">
	  </div>
      </div>

      <div class="form-group">
	  <div class="col-xs-6">
	     <label for="beds"><h4>Number of Beds</h4></label>
	      <input type="text" class="form-control" name="beds" id="beds" placeholder="Number of Beds" title="enter number of beds if any.">
	  </div>
      </div>

      <div class="form-group">
          <div class="col-xs-6">
             <label for="bathrooms"><h4>Number of Bathrooms</h4></label>
              <input type="text" class="form-control" name="bathrooms" id="bathrooms" placeholder="Number of bathrooms" title="enter number of bathrooms if any.">
          </div>
      </div>
	
      <div class="form-group">

	  <div class="col-xs-6">
	      <label for="email"><h4>Email</h4></label>
	      <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
	  </div>
      </div>
      <div class="form-group">

      <div class="col-xs-6">
	      <label for="number"><h4>Phone Number</h4></label>
	      <input type="number" class="form-control" name="number" id="number" placeholder="number" title="Enter your numernumber">
	  </div>
      </div>

      <div class="form-group">
      
      <div class="col-xs-12">
          <label for="description"><h4>Additional Comments</h4></label> 
          <textarea type="description" class="form-control" name="description" id="description" placeholder="Additional comments" rows="5"></textarea>
      </div>
      </div>


      <div class="form-group">
	   <div class="col-xs-12">
		<br>
		<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
		<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Submit</button>
	    </div>
      </div>
</form>
</div>	

</div>

<script>
    $(document).ready(function(){
        $('#Add-Listing-Pill').addClass("active");
    });

</script>

<div class="container-fluid" id="profile-color">
	<div class="row">
  		<div class="col-sm-10" id="main_text_color"><h1><?php echo htmlspecialchars($_SESSION['name'], ENT_QUOTES, 'UTF-8'); ?></h1></div>
<!--    
	<div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>
-->    
</div>
    <div class="row">
  		<div class="col-sm-3"><!--left col-->
              
          <ul class="list-group">
            <li class="list-group-item text-muted">Profile</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Name: </strong></span><?php echo htmlspecialchars($_SESSION['name'],ENT_QUOTES,'UTF-8');?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Email: </strong></span><?php echo htmlspecialchars($_SESSION['member_user_email'],ENT_QUOTES,'UTF-8'); ?></li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Phone Number: </strong></span><?php echo htmlspecialchars($_SESSION['phone_number'],ENT_QUOTES, 'UTF-8'); ?></li>
            
          </ul> 

        </div><!--/col-3-->
    	<div class="col-sm-9">
          
          <ul class="nav nav-tabs" id="myTab">
            <li class="active"><a href="#home" data-toggle="tab">Home</a></li>
            <li><a href="#messages" data-toggle="tab">Messages</a></li>
            <li><a href="#settings" data-toggle="tab">Settings</a></li>
          </ul>
              
          <div class="tab-content">
            <div class="tab-pane active" id="home">
              <div class="table-responsive">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Listing ID</th>
                      <th>Title</th>
                      <th>Price</th>
                      <th>Address</th>
                      <th>Square Feet</th>
                      <th>Move In Date</th>
                    </tr>
                  </thead>
                  <tbody id="items">
                  <?php foreach ($member_user_listings as $listing) {?>
                    <tr class="clickable_details_row" id="<?php echo $listing->id;?>">
                      <td><?php if(isset($listing->id)) echo htmlspecialchars($listing->id,ENT_QUOTES,'UTF-8');?></td>
                      <td><?php if(isset($listing->title)) echo htmlspecialchars($listing->title,ENT_QUOTES,'UTF-8');?></td>
                      <td><?php if(isset($listing->price)) echo htmlspecialchars($listing->price,ENT_QUOTES,'UTF-8');?></td>
                      <td><?php if(isset($listing->address)) echo htmlspecialchars($listing->address,ENT_QUOTES,'UTF-8');?></td>
                      <td><?php if(isset($listing->square_feet)) echo htmlspecialchars($listing->square_feet,ENT_QUOTES,'UTF-8');?></td>
                      <td><?php if(isset($listing->move_in_date)) echo htmlspecialchars($listing->move_in_date,ENT_QUOTES,'UTF-8');?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                </table>
                <!-- <hr> -->
                <div class="row">
                  <div class="col-md-4 col-md-offset-4 text-center">
                  	<ul class="pagination" id="myPager"></ul>
                  </div>
                </div>
              </div>
            
             </div><!--/tab-pane-->

<!-- Messages -->
             <div class="tab-pane" id="messages">
               
               <h2></h2>
              
	<!-- where list of messages go --> 
               <ul class="list-group">
                  <li class="list-group-item text-muted">Inbox</li>

                 <?php foreach ($all_user_messages as $message) {?>
                   <li class="list-group-item text-right"><a href="#" onclick="return false;"><?php echo htmlspecialchars($message->message,ENT_QUOTES, 'UTF-8')?></a></li>
                    <?php } ?>
                </ul> 
               
             </div><!--/tab-pane-->
             <div class="tab-pane" id="settings">
            		
               	
                  <hr>
                  <form class="form" action="<?php echo URL;?>profile/update" method="post" id="registrationForm">

                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="first_name"><h4>First Name</h4></label>
                              <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" title="enter your first name if any.">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Last Name</h4></label>
                              <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" title="enter your last name if any.">
                          </div>
                      </div>
 
                      <div class="form-group">
                          <div class="col-xs-6">
                              <label for="phone"><h4>Primary Phone</h4></label>
                              <input type="text" class="form-control" name="phone" id="phone" placeholder="(###) ###-####" title="enter your phone number if any.">
                          </div>
                      </div>
          
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Mobile Phone</h4></label>
                              <input type="text" class="form-control" name="mobile" id="mobile" placeholder="(###) ###-####" title="enter your mobile number if any.">
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
                              <label for="password"><h4>Password</h4></label>
                              <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" title="enter your password.">
                          </div>
                      </div>

                      <div class="form-group">
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify Password</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="Re-Enter Password" title="enter your password2.">
                          </div>
                      </div>

                      <div class="form-group">
                           <div class="col-xs-12">
                                <br>
				<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button>
                              	<button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                            </div>
                      </div>
              	</form>
              </div>
               
              </div><!--/tab-pane-->
          </div><!--/tab-content-->

        </div><!--/col-9-->
    </div><!--/row-->



<script>
    $(document).ready(function(){
        $('#Add-Listing-Pill').addClass("active");
    });

</script>

<script src = "<?php echo URL;?>js/profile"></script>
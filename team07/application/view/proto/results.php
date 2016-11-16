<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro     ssorigin="anonymous">


<div class="fill-height center" id="secondary_background">

    <form class="form-inline"  id="black_text" action="<?php echo URL; ?>proto/searchlisting" method="POST">
        <div id="search_bar" style= "background:lightblue;">
	<input class="form-control " style="width:30%; float:left;" type="text" name="key"  placeholder="Search location..." required >
        <input class="btn btn-success" style="float:left" type="submit" name="submit_search" value="Search"/>

     <div class="dropdown" style="float:right; margin-right:4px">
  <button class="btn btn-default dropdown-toggle" id="sort" type="button" data-toggle="dropdown">Sort
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><option value="price">Price</option></li>
    <li><option value="id">Listing ID</option></li>
  </ul>
</div>

<!--
        <select class="btn btn-default dropdown-toggle" name="slt_sort_by" style="float: right; margin-right: 4px;">
            <option value="price">Price</option>
            <option value="id">Listing ID</option>
        </select>
	</div>
    </form>

    <br /><b><u>NOTE</u>!</b> We only have 2 apartments in DB,
    <br />search by any character from its addresses:<br />
    <br />566 46th Ave
    <br />362 43rd Ave
    <br />I am logged in
-->
<!-- Output  Test -->
<div class="row">
  <div class="col-md-9 col-md-push-3">
	<!-- Filter Column -->
<h3>MEOW MEOW</h3>	



  </div>
  <div class="col-md-3 col-md-pull-9">
	<!-- Results Column -->     
     
 </div>
</div>
<?php if(isset($apartments)) { ?>
    <div class="box">
    <h3>Result</h3>

	
    <table>
    <thead style="background-color: #ddd; font-weight: bold;">
    <tr>
        <td>Id</td>
        <td>Address</td>
        <td>Price</td>
        <td>Pictures</td>

    </tr>
    </thead>
    <tbody>




    <?php foreach ($apartments as $apartment) { ?>

        <tr>
            <td><?php if (isset($apartment->id)) echo htmlspecialchars($apartment->id, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($apartment->address)) echo htmlspecialchars($apartment->address, ENT_QUOTES, 'UTF-8'); ?> </td>
            <td><?php if (isset($apartment->price)) echo htmlspecialchars($apartment->price, ENT_QUOTES, 'UTF-8'); ?> </td>
            <td height="200" width="200">
                <?php if (isset($apartment->image)) { ?>
                    <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($apartment->image).
                        '" height="150" width="150"/>' ?>
                <?php } ?>
            </td></div>
        </tr>
    <?php } ?>
    </tbody>
    </table>
    </div>
    </div>

<?php } ?>

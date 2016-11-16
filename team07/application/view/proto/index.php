<!--

<div class=box>
        <h3> Search For a listing </h3>
        <form action="<?php echo URL; ?>proto/searchlisting" method="POST">
          <input type="text" name="key" required >
          <input type="submit" name="submit_search" value="Submit"/>
            <select name="slt_sort_by">
                <option value="price">Price</option>
                <option value="id">Listing ID</option>
            </select>
            </form>
    -->




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro    ssorigin="anonymous">



<div class="fill-height center" id="secondary_background">
        <h3 class="text_color_white"style="padding-top:30px"> Find your new home ... </h3>
		
        <form class="form-inline" id="black_text" action="<?php echo URL; ?>proto/searchlisting" method="POST">
          <input class="form-control " style="width:30%" type="text" name="key"  placeholder="Search location..." required >
          <input class="btn btn-success" type="submit" name="submit_search" value="Search"/>
        </form>


		<br /><b><u>NOTE</u>!</b> We only have 2 apartments in DB,
		<br />search by any character from its addresses:<br />
		<br />566 46th Ave
		<br />362 43rd Ave

        <!-- TESTING LOG IN -->
        <?php if(isset($_SESSION['user'])) echo $_SESSION['user']; ?>
        <br>
        <?php if(isset($_SESSION['name'])) echo $_SESSION['name']; ?>
        <br>
        <?php if(isset($_SESSION['phone_number'])) echo $_SESSION['phone_number']; ?>
        <br>



</div>

<!-- Output  Test -->


<?php if(isset($apartments)) { ?>

<p> SOMETHING HAS GONE TERRIBLY WRONG</p>
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

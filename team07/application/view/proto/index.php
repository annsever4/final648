<div class=box>
        <h3> Search For a listing </h3>
        <form action="<?php echo URL; ?>proto/searchlisting" method="POST">
          <input type="text" name="key" required >
          <input type="submit" name="submit_search" value="Submit"/>
        </form>

    <select name="slt_sort_by">
        <option value="price">Price</option>
        <option value="id">Listing ID</option>
    </select>



	<p>
        <br>
        <br>
        <br>
		<br /><b><u>NOTE</u>!</b> We only have 3 apartments in DB,
		<br />search by any character from its addresses search:<br />
		<br />566 46th Ave	
		<br />362 43rd Ave	
	</p>

</div>

<!-- Output  Test -->


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
            </td>
<?php } ?>
                </tbody>
                </table>
        </div>
</div>
           
<?php } ?>

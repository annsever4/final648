<div class=box>
        <h3> Search For a listing </h3>
        <form action="<?php echo URL; ?>proto/searchlisting" method="POST">
          <input type="text" name="key" required >
          <input type="submit" name="submit_search" value="Submit"/>
        </form>

	<p>
		<br /><b><u>NOTE</u>!</b> We only have 2 apartments in DB, 
		<br />search by any character from its addresses:<br />
		<br />566 46th Ave	
		<br />362 43rd Ave	
	</p>
</div>

<!-- Output  Test -->


<?php if(isset($appartments)) { ?>

<div class="box">
<h3>Result</h3>
        <table>
        <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                <td>Id</td>
                <td>Address</td>
                <td>Price</td>
                <td height="200" width="200">Pictures</td>

                </tr>
         </thead>
         <tbody>





<?php foreach ($appartments as $appartment) { ?>

        <tr>
            <td><?php if (isset($appartment->id)) echo htmlspecialchars($appartment->id, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($appartment->address)) echo htmlspecialchars($appartment->address, ENT_QUOTES, 'UTF-8'); ?> </td>
            <td><?php if (isset($appartment->price)) echo htmlspecialchars($appartment->price, ENT_QUOTES, 'UTF-8'); ?> </td>
            <td height="200" width="200">
                <?php if (isset($appartment->image)) { ?>
                   <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($appartment->image).'"/>' ?>
                <?php } ?>
            </td>
<?php } ?>
                </tbody>
                </table>
        </div>
</div>
           
<?php } ?>

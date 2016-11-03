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
                <td>Pictures</td>

                </tr>
         </thead>
         <tbody>





<?php foreach ($appartments as $appartment) { ?>

        <tr>
            <td><?php if (isset($appartment->idApartment)) echo htmlspecialchars($appartment->idApartment, ENT_QUOTES, 'UTF-8'); ?></td>
            <td><?php if (isset($appartment->Address)) echo htmlspecialchars($appartment->Address, ENT_QUOTES, 'UTF-8'); ?> </td>
            <td><?php if (isset($appartment->Price)) echo htmlspecialchars($appartment->Price, ENT_QUOTES, 'UTF-8'); ?> </td>
            <td>
                <?php if (isset($appartment->Image)) { ?>
                   <?php echo '<img src="data:image/jpeg;base64, '.base64_encode($appartment->Image).'"/>' ?>
                <?php } ?>
            </td>
<?php } ?>
                </tbody>
                </table>
        </div>
</div>
           
<?php } ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro    ssorigin="anonymous">




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

           
<?php } ?>

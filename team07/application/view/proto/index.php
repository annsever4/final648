<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro    ssorigin="anonymous">



<div class="fill-height center" id="secondary_background">
        <h3 class="text_color_white"style="padding-top:30px"> Find your new home ... </h3>
		
        <form class="form-inline" id="black_text" style="margin-bottom:25%" action="<?php echo URL; ?>proto/searchlisting" method="POST">
          <input class="form-control " style="width:30%" type="text" name="key"  placeholder="Search location..." required >
          <input class="btn btn-success" type="submit" name="submit_search" value="Search"/>
        </form>
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

           
<?php } ?>



<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88370313-1', 'auto');
  ga('send', 'pageview');

</script>

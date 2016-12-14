<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" cro    ssorigin="anonymous">



<!-- Output  Test -->
<?php if(isset($listings)) { ?>
<div class="container-fluid">

    <?php for($i = 0; $i < 3; $i++) { ?>
        <div class = "row">

            <?php for($j = 0; $j < 3; $j++) { ?>
            <div class = "col-md-4">

                <div class = "col-md-8">
                    <?php echo '<img src="data:image/jpeg;base64, '.base64_encode(current($listings)->image).
                        '"max-height="300px" max-width="300px"/>' ?>
                    </div>

                <div class = "col-md-4">
                    <div class = "panel panel-default">

                        <div class = "panel-heading">
                            <h3 class = "panel-title"><?php echo current($listings)->price;?></h3>
                            </div>

                        <div class = "panel-body">
                            <?php echo current($listings)->title; ?>
                            </div>

                    </div>

                </div>
                </div>
                <?php try{
                    next($listings);
                } catch (Exception $e) {
                    echo "<script>console.log('bounds exception ins listings array')</script>";
                }
            } ?>



        </div>



   <?php } ?>


</div>






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

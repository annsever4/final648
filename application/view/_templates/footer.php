



</div>

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>






<!-- <script src="http://maps.google.com/maps/api/js?key=AIzaSyCP0FlO1B2ZZC5srVzlzpnnPjgZy2GysrQ&"></script> -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script> -->
    <!-- our JavaScript -->

    <script src="<?php echo URL; ?>js/jquery.redirect.js"></script>
    <script src="<?php echo URL; ?>js/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="<?php echo URL; ?>js/details.js"></script>
    <script src="<?php echo URL; ?>js/profile.js"></script>
    <script src="<?php echo URL; ?>js/common_helpers.js"></script>
    <!--<script src="<?php # echo URL;?>js/nav-bar-active.js" -->
    <script>
        $("#registrationForm").validate();
    </script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-88370313-1', 'auto');
  ga('send', 'pageview');

</script>

    <div class="container-fluid footer" id="main_background">
            <div class="row">
	    	&copy; This site is developed by the Team 007 @ SFSU
            </div>
    </div>

</html>

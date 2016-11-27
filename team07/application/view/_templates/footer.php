</div><!-- close global container -->

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <!-- ><script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->

    <!-- define the project's URL (to make AJAX calls possible, even when using this in sub-folders etc) -->
    <script>
        var url = "<?php echo URL; ?>";
    </script>

    <!-- Latest compiled and minified JavaScript, over CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- our JavaScript -->

    <script src="<?php echo URL; ?>js/jquery-3.1.1.js"></script>
    <script src="<?php echo URL; ?>js/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script src="<?php echo URL; ?>js/details.js"></script>
    <script>
        $("#registrationForm").validate();
    </script>


    <div class="container-fluid footer" id="main_background">
        &copy; This site is developed by the Team 007 @ SFSU 
    </div>

</html>

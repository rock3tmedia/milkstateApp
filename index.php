<?php

//get options
include 'options.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- base required -->
        <base href="<?php echo $base_url; ?>" />

        <!-- meta tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="description" content="milkstateJS." />

        <!-- initial title of app -->
        <title>milkstateJS Example.</title>

        <!-- load icon -->
        <link rel="icon" type="image/x-icon" href="/<?php echo $app_name; ?>/favicon.ico" />

        <!-- load google fonts here with preload -->
        <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" as="font" crossorigin="anonymous" />

        <!-- load style sheets required before running app -->
        <link rel="stylesheet" type="text/css" href="css/master.css" />

        <!-- load scripts required before running app -->
        <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>-->
        <!-- uncomment the following if you wish to use a local jQuery when jQuery's host is down -->
        <!--<script>!window.jQuery && document.write('<script src="/js/app/dependencies/jquery-3.1.1.min.js"><\/script>')</script>-->
        <script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
        <script type="text/javascript" src="js/iscroll-probe.js"></script>
        <script type="text/javascript" src="js/detectBrowser.js"></script>

        <!-- local or cdn -->
        <!-- <script type="text/javascript" src="js/milkstate.dev.js"></script> -->
        <!-- https://cdn.jsdelivr.net/gh/rock3tmedia/milkstateJS@final/dist/milkstate.min.js -->

        <!-- for milkstateJS development -->
        <script type="text/javascript" src="/milkstateJS/dist/milkstate.dev.js"></script> -->
        
        <!-- start app -->
        <script type="text/javascript">
            $(document).ready(function() {

                //run
                msJS({
                    app_name: "<?php echo $app_name; ?>",
                    json_views: "views/views.json",
                    base_url: "<?php echo $base_url; ?>"
                });
            });
        </script>
    </head>
    <body class="preload" id="body">

    </body>
</html>
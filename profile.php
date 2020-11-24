<?php

// code to put profile session variable to $name:
// $name = $_SESSION['profile'];

?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php //echo $name ?>'s Profile</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">     
    </head>

<body>
    <?php include('include/navbar.php'); ?>

    <div class="container">
        <!-- for jquery to get profile info from server -->
        <div hidden id="profile-name"><?php //echo $name ?></div>
        <div class="row">
            <div class="col-sm-12">
                <div id="header-img">
                    <!-- insert header image and profile name -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <!-- insert profile -->
                <!-- insert biography -->
                <!-- insert awards -->                
                <!-- insert other accolades/info -->
            </div>
            <div class="col-sm-3">
                <!-- insert photo -->
                <!-- insert location -->
                <!-- insert contact info -->
                <!-- insert social links -->
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // insert ajax function to get profile info
            // pass profile name to function using
            // var name = $('#profile-name').text();
            // and send to include/fetch-profile.php

        })
    </script>
</body>
</html>


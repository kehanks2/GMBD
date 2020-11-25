<?php
include("config.php");
session_start();

// code to put profile session variable to $name
$name = $_SESSION['name'];
$id = $_SESSION['id'];

?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $name ?>'s Profile</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">     
    </head>

<body>
    <?php include('include/navbar.php'); ?>

    <div class="container">
        <!-- for jquery to get profile info from server -->
        <div hidden id="profile-id"><?php echo $id ?></div>
        <div class="row">
            <div class="col-sm-12">
                <div id="header-img">
                    <!-- insert header image and profile name (accessible with <?php // $name // ?> -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <h3>Biography</h3>
                    <div id="biography"></div>
                <h3>Awards</h3>
                    <div id="awards"></div>
                <h3>Other</h3>               
                    <div id="other-info"></div>
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

            get_profile();
            
            // ajax function to get profile info; pass profile id to function then send to include/fetch-profile.php
            function get_profile() {
                var id = $('#profile-id').text();
                $.ajax({
                    url: 'include/fetch-profile.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id
                    }, success: function(data) {
                        // replace placeholders for each piece of profile information in the html with the data from the fetch
                        // do this with the data passed back from the php or in the php itself (like with the datatables)
                    }
                })
            }

        })
    </script>
</body>
</html>


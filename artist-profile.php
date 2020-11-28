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
    </div>

    <!-- Header -->
    <div style=" background-color:white; border-bottom: double; border-bottom-color: gold; padding-bottom: 200px; padding-top: 20px">
    </div>

    
    <!-- BIO -->
    <div style=" width: 300px; padding: 50px; margin: 20px">
      <div style="color: black; display:flex; justify-content:left; padding-left:5px">
        <strong style="font-size:larger">bio:</strong>
        <div>
          <p1>[bio goes here]</p1>
        </div>
      </div>
    </div>

    <!-- History/Awards -->
    <div style="color: black; display:flex; justify-content:right; padding-right:400px">
    <b>History: </b>
      <ul>
        <li>
          <ul style="list-style-type:disc">
            <li>list1</li>
            <li>list2</li>
            <li>list3</li>
          </ul>
        </li>
      </ul>
    </div>

    <!-- extra Info -->
    <div style=" width: 300px; padding: 50px; margin: 20px">
      <div style="color: black; display:flex; justify-content:left; padding-left:5px">
        <strong style="font-size:larger">Info:</strong>
        <div>
          <p1>[info goes here]</p1>
        </div>
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


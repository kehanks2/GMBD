<?php
include("include/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
	<!-- HEADER -->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Georgia Music Business Directory - Register</title>

		<!-- Stylesheets -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css">
		    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
    <script src="js/jquery-3.4.1.min.js" type="text/javascript"></script>
	</head>

    <body>
<!-- NAVIGATION -->
<?php include('include/navbar.php'); ?>
<div id="register-account-header">
    <div class="d-flex flex-column align-items-center justify-content-center">
        <h1 id="register-account-title">Register New Account</h1>
    </div>
</div>
<!-- PAGE CONTENT -->
<div class="container-fluid">	
	<div class="row justify-content-center">
		<div class="col-md-6">            
            <form class="register-form" method="POST" action="">
                <div class="form-group">
                    <input type="text" class="form-control" name="fname" id="fname" required="required" placeholder="Enter your first name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="lname" id="lname" required="required" placeholder="Enter your last name">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="username" id="username" required="required" placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" id="password" required="required" placeholder="Enter your password">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" id="email" required="required" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <select required id="profession" class="form-control">
                        <option disabled selected>Select your profession</option>
                        <option id="artist-profession">Artist</option>
                        <option id="business-profession">Business</option>
                        <option id="venue-profession">Venue</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="pname" id="pname" required="required" placeholder="Enter your professional name or business name">
                </div>               
                <div class="text-center">
                    <input type="submit" id="submit-btn" name="submit" class="btn btn-lg btn-primary" value="CREATE ACCOUNT" data-toggle="tooltip" data-placement="bottom" title="Click to register a new account">
                </div>
            </form>	  
		</div>
	</div>	
</div>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script src="js/popper.min.js"></script>
<script src="js/bootstrap-4.4.1.js"></script>	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript">
		$(function () {
  			$('[data-toggle="tooltip"]').tooltip();
		})
	</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#submit-btn').click( function () {
                var data = $('#register-form').serialize();
                $.ajax({
                    url: 'include/register.php',
                    type: 'POST',
                    dataType: 'JSON',
                    data: { data }, 
                    success: function(data) {                    
                    }
                })
            })
        })

    </script>
</body>
</html>
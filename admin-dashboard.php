<?php
include("include/config.php");
session_start();

if ($_SESSION['user_type'] != 'Admin') {
    header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Admin Dashboard</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">     
    </head>

<body>
    <?php include('include/navbar.php'); ?>


        <div id="admin-dashboard-header">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <h1>Admin Dashboard</h1>
            </div>
        </div>

        <div class="container" style="padding-top:30px">

            <!-- select usertype -->
            <div class="row form-inline">		
                <div class="form-group">
                    <select class="form-control" id="select-usertype">
                        <option selected disabled>Select a usertype</option>
                        <option value="Artist" id="artist">Artist</option>
                        <option value="Business" id="business">Business</option>
                        <option value="Venue" id="venue">Venue</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="button" id="go-to-usertype" class="btn btn-success">
                        View Users
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">              
                    <div hidden id="show-artist-table">
                        <table id="artist-table" class="table table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Artist Name</th>
                                    <th>Status</th>
                                    <th>Update Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>    
                    <div hidden id="show-business-table">
                        <table id="business-table" class="table table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Business Name</th>
                                    <th>Status</th>
                                    <th>Update Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>  
                    <div hidden id="show-venue-table">
                        <table id="venue-table" class="table table-striped" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>Venue Name</th>
                                    <th>Status</th>
                                    <th>Update Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            fetch_data();

            function fetch_data() {
                if ($('#show-artist-table').is('visible')) {
                    var dataTable = $('#artist-table').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "dom": '<"top"f>t<"bottom"ip>',
                        "order": [],
                        "ajax": {
                            url: "include/fetch-admin.php",
                            type: "POST",
                            data: { table: "Artist" }
                        }
                    });
                } else if ($('#show-business-table').is('visible')) {
                    var dataTable = $('#business-table').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "dom": '<"top"f>t<"bottom"ip>',
                        "order": [],
                        "ajax": {
                            url: "include/fetch-admin.php",
                            type: "POST",
                            data: { table: "Business" }
                        }
                    });
                } else if ($('#show-venue-table').is('visible')) {
                    var dataTable = $('#venue-table').DataTable({
                        "processing": true,
                        "serverSide": true,
                        "dom": '<"top"f>t<"bottom"ip>',
                        "order": [],
                        "ajax": {
                            url: "include/fetch-admin.php",
                            type: "POST",
                            data: { table: "Venue" }
                        }
                    });
                }                
            }; 

            // determines which usertype table is shown to the admin
            $('#go-to-usertype').click(function() {
                var usertype = $('#select-usertype').val();
                if (usertype == 'Artist') {
                    $('#show-artist-table').removeAttr('hidden');
                    $('#show-business-table').prop('hidden', true);
                    $('#show-venue-table').prop('hidden', true);
                } else if (usertype == 'Business') {
                    $('#show-business-table').removeAttr('hidden');
                    $('#show-artist-table').prop('hidden', true);
                    $('#show-venue-table').prop('hidden', true);
                } else if (usertype == 'Venue') {
                    $('#show-venue-table').removeAttr('hidden');
                    $('#show-artist-table').prop('hidden', true);
                    $('#show-business-table').prop('hidden', true);
                } else {
                    return;
                }
			});

        })
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Venue Directory</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">     
    </head>

    <body>
        <?php include('include/navbar.php'); ?>

        <div class="container">
            <div class="row d-flex">
                <div class="justify-content-center">
                    <h1>Venue Directory</h1>
                </div>
            </div>
            <!-- venue table -->
            <div class="row">
                <div class="col-sm-12">
                    <table id="venue-table" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Venue Name</th>
                                <th>Venue Type</th>
                                <th>Capacity</th>
                                <th>Phone Number</th>
                                <th>Email</th>
                                <th>Website</th>
                                <th>Zip Code</th>
                            </tr>
                        </thead>
                    </table>
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
            fetch_data();

            function fetch_data() {
                var dataTable = $('#venue-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "dom": '<"top"f>t<"bottom"ip>',
                    "order": [],
                    "ajax": {
                        url: "include/fetch-venue.php",
                        type: "POST"
                    }
                });
            };

            $('#venue-table').on('click', '#profile-name', function() {
                var id = $(this).parent('div').data('id');
                var name = $(this).text();

                toProfile(id, name);
            })

            function toProfile(id, name) {
                $.ajax({
                    url: 'include/to-profile.php',
                    method: 'POST',
                    dataType: 'JSON',
                    data: {
                        id: id,
                        name: name
                    }, success: function(data) {
                        window.location('profile.php');
                    }
                })
            }
        });

    </script>


    </body>
</html>
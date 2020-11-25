<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Artist Directory</title>

        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css">     
    </head>

    <body>
        <?php include('include/navbar.php'); ?>

        <div style=" background-image:url(/img/extra.jpg); border-bottom: double; border-bottom-color: gold; padding-bottom: 150px; padding-top: 1px">
                <div class="d-flex flex-column align-items-center justify-content-center">
                    <h1 style="font-size: 100px; -webkit-text-stroke-width: 2px; -webkit-text-stroke-color: black; color: white;">Artist Directory</h1>
                </div>
            </div>

        <div class="container" style="padding-top:30px">

            <!-- artist table -->
            <div class="row">
                <div class="col-sm-12">
                    <table id="artist-table" class="table table-striped" style="width:100%;">
                        <thead>
                            <tr>
                                <th>Artist Name</th>
                                <th>Genre</th>
                                <th>Website</th>
                                <th>Email</th>
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
                var dataTable = $('#artist-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "dom": '<"top"f>t<"bottom"ip>',
                    "order": [],
                    "ajax": {
                        url: "include/fetch-artist.php",
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

    <?php include('include/footer.php'); ?>
    </body>
</html>

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

        <div id="artist-directory-header">
            <div class="d-flex flex-column align-items-center justify-content-center">
                <h1>Artist Directory</h1>
            </div>
        </div>

        <div class="container" style="padding-top:30px">

        
            <!-- artist table -->
            <div class="row">
                <div class="col-sm-12">

                <div class="col-md-4">
                    <div class="form-group">
                    <select name="filter_genre" id="filter_genre" class="form-control" required>
                        <option value="">Select Genre</option>
                        <?php echo $country; ?>
                    </select>
                    </div>
                <div class="form-group" align="center">
                    <button type="button" name="filter" id="filter" class="btn btn-info">Filter</button>
                </div>
            </div>

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

        
    <!-- FOOTER -->
    <?php include('include/footer.php'); ?>

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
            //--------------- FILTER---------------//

            $('#artist-table').on('click', '#profile-name', function() {
                var id = $(this).parent('div').data('id');
                var name = $(this).text();

                toProfile(id, name);
            })

            function toProfile(id, name) {
                $.ajax({
                    url: 'include/to-artist-profile.php',
                    method: 'POST',
                    data: {
                        id: id,
                        name: name
                    }, success: function(data) {
                        if (data != 'error') {
                            window.location.assign(data);
                        } else {
                            alert("error");
                        }
                    }
                })
            }
            
        });

    </script>
    </body>
</html>
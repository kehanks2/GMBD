<!DOCTYPE html>


<?php
//--------------- FILTER---------------//
include('include/config.php');
session_start();
//$capacity = '';
//$query = "SELECT DISTINCT Capacity FROM Venue ORDER BY Capacity ASC";
//$statement = $connect->prepare($query);
//$statement->execute();
//$result = $statement->fetchAll();
//foreach($result as $row)
//{
// $capacity .= '<option value="'.$row['Capacity'].'">'.$row['Capacity'].'</option>';
//}

?>

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

        <div id="venue-directory-header">
		    <div class="d-flex flex-column align-items-center justify-content-center">
                <h1>Venue Directory</h1>
            </div>
		</div>

        <div class="container" style="padding-top:30px">
            <!-- venue table -->
            <div class="row">
                <div class="col-sm-12">

                    <table border="0" cellspacing="5" cellpadding="5">
                        <tbody><tr>
                            <td>Minimum Capacity:</td>
                            <td><input type="text" id="min" name="min"></td>
                        </tr>
                        <tr>
                            <td>Maximum Capacity:</td>
                            <td><input type="text" id="max" name="max"></td>
                        </tr>
                    </tbody></table>

                    <table id="venue-table" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th data-toggle="tooltip" title="Sort by name">Venue Name</th>
                                <th data-toggle="tooltip" title="Sort by capacity">Capacity</th>
                                <th data-toggle="tooltip" title="Sort by number">Phone Number</th>
                                <th data-toggle="tooltip" title="Sort by email">Email</th>
                                <th data-toggle="tooltip" title="Sort by city">City</th>
                                <th data-toggle="tooltip" title="Sort by state">State</th>
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

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">

$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var min = parseInt( $('#min').val(), 10 );
        var max = parseInt( $('#max').val(), 10 );
        var capacity = parseFloat( data[3] ) || 0; // use data for the capacity column
 
        if ( ( isNaN( min ) && isNaN( max ) ) ||
             ( isNaN( min ) && capacity <= max ) ||
             ( min <= capacity   && isNaN( max ) ) ||
             ( min <= capacity   && capacity <= max ) )
        {
            return true;
        }
        return false;
    }
);


        $(document).ready(function() {
            fetch_data();

            function fetch_data() {
                var dataTable = $('#venue-table').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "dom": '<"top"f>t<"bottom"ip>',
                    "ajax": {
                        url: "include/fetch-venue.php",
                        type: "POST"
                    }
                });
                $('#min, #max').keyup( function() {
                    table.draw();
                } );
            };
//--------------- FILTER---------------//

            function toProfile(id, name) {
                $.ajax({
                    url: 'include/to-venue-profile.php',
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

    <?php include('include/footer.php'); ?>
    
    </body>
</html>
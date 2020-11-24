<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include('config.php');

$columns = array('', '', '', '');

$query = "SELECT * FROM Business ";

if(isset($_POST["search"]["value"])) {
    $query .= ' 
        WHERE  LIKE "%'.$_POST["search"]["value"].'%"
        OR  LIKE "%'.$_POST["search"]["value"].'%" 
        ';
}

if (isset($_POST["order"])) {
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
} else {
    $query .= ' ORDER BY  DESC ';
}

$query1 = '';

if ($_POST["length"] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($db, $query . $query1));

$result = mysqli_query($db, $query);

$data = array();

while ($row = mysqli_fetch_array($result)) {
    if ($row['Status'] == 1) {
        $sub_array = array();
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row[''].'"><a href="#" id="profile-name">'.$row[''].'</a></div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row[''].'">'.$row[''].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row[''].'">'.$row[''].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row[''].'">'.$row[''].'</div>';

        $data[] = $sub_array;
    }    
}

function get_all_data($db) {
    $query = "SELECT * FROM Business";
    $result = mysqli_query($db, $query);
    return mysqli_num_rows($result);
}

$output = array(
    "draw"              =>  intval($_POST["draw"]),
    "recordsTotal"      =>  get_all_data($db),
    "recordsFiltered"   =>  $number_filter_row,
    "data"              =>  $data
);

echo json_encode($output);

?>


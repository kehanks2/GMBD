<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include('config.php');

$columns = array('artistName', 'genre', 'website', 'email');

$query = "SELECT * FROM artist ";

if(isset($_POST["search"]["value"])) {
    $query .= ' 
        WHERE artistName LIKE "%'.$_POST["search"]["value"].'%"
        OR genre LIKE "%'.$_POST["search"]["value"].'%" 
        ';
}

if (isset($_POST["order"])) {
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
} else {
    $query .= ' ORDER BY artistName DESC ';
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
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['artistName'].'"><a href="#" id="profile-name">'.$row['artistName'].'</a></div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['genre'].'">'.$row['genre'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['website'].'">'.$row['website'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['email'].'">'.$row['email'].'</div>';

        $data[] = $sub_array;
    }    
}

function get_all_data($db) {
    $query = "SELECT * FROM artist";
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


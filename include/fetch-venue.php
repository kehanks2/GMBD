<?php
ini_set('display_startup_errors', true);
error_reporting(E_ALL);
ini_set('display_errors', true);

include('config.php');

$columns = array('VenueName', 'VenueType', 'Capacity', 'PhoneNumber', 'Email', 'Website', 'ZipCode');

$query = "SELECT * FROM Venue ";

if(isset($_POST["search"]["value"])) {
    $query .= ' 
        WHERE VenueName LIKE "%'.$_POST["search"]["value"].'%"
        OR VenueType LIKE "%'.$_POST["search"]["value"].'%" 
        ';
}

if (isset($_POST["order"])) {
    $query .= ' ORDER BY '.$columns[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' 
    ';
} else {
    $query .= ' ORDER BY VenueName DESC ';
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
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['VenueName'].'"><a href="#" id="profile-name">'.$row['VenueName'].'</a></div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['VenueType'].'">'.$row['VenueType'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['Capacity'].'">'.$row['Capacity'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['PhoneNumber'].'">'.$row['PhoneNumber'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['Email'].'">'.$row['Email'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['Website'].'">'.$row['Website'].'</div>';
        $sub_array[] = '<div class="update" data-id="'.$row["VenueID"].'" data-column="'.$row['ZipCode'].'">'.$row['ZipCode'].'</div>';

        $data[] = $sub_array;
    }    
}

function get_all_data($db) {
    $query = "SELECT * FROM Venue";
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


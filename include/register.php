<?php
include('config.php');
$params = array();
parse_str($_POST, $params);

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$profession = mysqli_real_escape_string($db, $_POST['profession']);

$usertype = '';
if ($profession == 'Artist') {
    $usertype = 1;
} else if ($profession == 'Business') {
    $usertype = 2;
} else if ($profession == 'Venue') {
    $usertype = 3;
}

// still need to make the query to the db to add the user in
?>
<?php
include('config.php');
$params = array();
parse_str($_POST, $params);

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = mysqli_real_escape_string($db, $_POST['password']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$profession = mysqli_real_escape_string($db, $_POST['profession']);
$fname = mysqli_real_escape_string($db, $_POST['fname']);
$lname = mysqli_real_escape_string($db, $_POST['lname']);
$pname = mysqli_real_escape_string($db, $_POST['pname']);

$usertype = '';
if ($profession == 'Artist') {
    $usertype = 1;
} else if ($profession == 'Business') {
    $usertype = 2;
} else if ($profession == 'Venue') {
    $usertype = 3;
}

// create new user
$query = "INSERT INTO Users (Username, Password, Email, AccountTypeID, FirstName, LastName) VALUES ($username, $password, $email, $usertype, $fname, $lname)";

$result = mysqli_query($db, $query);

if ($result) {
    $data = 0;
} else {
    $data = 1;
}

// create new usertype-specific user entry
$getuid = "SELECT UserID WHERE Username = '$username'";
$userid = '';
while ($row = mysqli_fetch_array(mysqli_query($db, $getuid))) {
    $userid = $row['UserID'];
}

$query1 = "";
if ($profession == 'Artist') {
    $query1 = "INSERT INTO Artist (artistName, Email, UserID) VALUES ($pname, $email, $userid)";
} else if ($profession == 'Business') {
    $query1 = "INSERT INTO Business (BusinessName, Email, UserID) VALUES ($pname, $email, $userid)";
} else if ($profession == 'Venue') {
    $query1 = "INSERT INTO Venue (VenueName, Email, UserID) VALUES ($pname, $email, $userid)";
}

if (mysqli_query($db, $query1)) {
    $data = 0;
} else {
    $data = 1;
}

echo $data;
?>
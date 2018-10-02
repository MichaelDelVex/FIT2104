<html>
<head>
    <title>Modify and View Clients</title>
</head>
<body>
<?php
include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
?>

<?php

if (isset($_POST['search'])) {
    $query="SELECT * FROM property WHERE property_type LIKE '$_POST[property_type]';";

    if (mysqli_query($conn, $query)) {
        echo $query;

    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

}
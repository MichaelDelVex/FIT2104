<html>
<head>
<title>Simple Example - Sending Data Back to User</title>
</head>
<body>
<?php
include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
?>

<?php 
    if (empty($_POST["id"]) || empty($_POST["gname"]) || empty($_POST["fname"]) 
    || empty($_POST["street"]) || empty($_POST["state"]) || empty($_POST["suburb"]) 
    || empty($_POST["pc"]) || empty($_POST["email"]) || empty($_POST["mobile"])
    || empty($_POST["mailinglist"]))
    {
?>
    <h1> EMPTY FIELDS </h1>
<?php
    } else {
        $query=" UPDATE client SET client_gname = '$_POST[gname]', client_fname = '$_POST[fname]'
        , client_street = '$_POST[street]', client_suburb = '$_POST[suburb]'
        , client_pc = '$_POST[pc]', client_email = '$_POST[email]' 
        , client_mobile = '$_POST[mobile]', client_mailinglist = '$_POST[mailinglist]'
        WHERE client_id LIKE $_POST[id];";

    }

    if (mysqli_query($conn, $query)) {
        echo $query;
        echo "Record updated successfully";
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        
    }
    
?>

</body>
</html>
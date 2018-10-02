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

    $result = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($result))
    {
        ?> 
        <form method="post" Action="../backend/modifyClient.php">
        <tr id=<?php echo $row['property_id'] ?> > <?php
        echo "<td>" ?> <input type=text name=id value=<?php echo $row['property_id'] ?>> <?php "</td>";
        echo "<td>" ?> <input type=text name=id value=<?php echo $row['property_type'] ?>> <?php "</td>";
        echo "</tr>"; ?>
        </form>
            <?php
    }



}
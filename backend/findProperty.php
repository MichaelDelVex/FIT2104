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

if (isset($_POST['Search'])) {

    if(!empty($_POST['property_type']) && !empty($_POST['property_suburb'])){
        $query = "SELECT * FROM property WHERE property_type LIKE $_POST[property_type] AND property_suburb LIKE '%$_POST[property_suburb]%'";
    } else if(!empty($_POST['property_type'])) {
        $query = "SELECT * FROM property WHERE property_type LIKE '$_POST[property_type]'";
    } else if(!empty($_POST['property_suburb'])) {
        $query = "SELECT * FROM property WHERE property_suburb LIKE '%$_POST[property_suburb]%'";
    } else {
        $query = "";
    }

    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) { ?>
        <form method="post" Action="../backend/findProperty.php">
            <tr id=<?php echo $row['property_id'] ?>> <?php
                echo "<td>" ?> <input type=text name=id value=<?php echo $row['property_id'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=seller_id value=<?php echo $row['seller_id'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=property_type value=<?php echo $row['property_type'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=property_street value=<?php echo $row['property_street'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=property_suburb value=<?php echo $row['property_suburb'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=property_state value=<?php echo $row['property_street'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=property_pc value=<?php echo $row['property_pc'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=list_price value=<?php echo $row['list_price'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=list_date value=<?php echo $row['list_date'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=sale_date value=<?php echo $row['sale_date'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=desc value=<?php echo $row['desc'] ?>> <?php "</td>";
                echo "<td>" ?> <input type=text name=image_name value=<?php echo $row['image_name'] ?>> <?php "</td>";
                echo "</tr>"; ?>
        </form> <?php
    }
} else {
        echo "Error finding data" ;
}
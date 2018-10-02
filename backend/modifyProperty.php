<html>
<head>
<title>Modify and View Properties</title>
</head>
<body>
<?php
include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
?>

<?php 

if (isset($_POST['delete'])) {
    $query="DELETE FROM property WHERE property_id LIKE $_POST[id]";

    if (mysqli_query($conn, $query)) {
        echo "Record deleted successfully";
        
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

} else if (isset($_POST['update'])) {
    
    $query=" UPDATE property SET property_type = '$_POST[type]', property_street = '$_POST[street]'
    , property_suburb = '$_POST[suburb]', property_state = '$_POST[state]', property_pc = '$_POST[pc]'
    , list_price = '$_POST[listprice]', list_date = '$_POST[listdate]' 
    , sale_date = '$_POST[saledate]', `desc` = '$_POST[desc]', image_name = '$_POST[imagename]'
    WHERE property_id LIKE $_POST[id];";

    echo $query; ?> <br> <?php

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

} else if (isset($_POST['add'])) {

    $result = mysqli_query($conn, "SELECT client_id FROM client WHERE client_mobile LIKE '$_POST[mobile]'");
    $row = mysqli_fetch_array($result);

    $queryAddProperty=" INSERT INTO property (seller_id, property_type, property_street, property_suburb, property_state, property_pc, list_price, list_date, `desc`, image_name)
    VALUES ('$row[client_id]', '$_POST[type]', '$_POST[street]', '$_POST[suburb]', '$_POST[state]', '$_POST[pc]', '$_POST[listprice]', '$_POST[listdate]', '$_POST[desc]', '$_POST[imagename]');";

    echo $queryAddProperty; ?> <br> <?php

    if (mysqli_query($conn, $queryAddProperty) ) {
        echo "Property Sucessfully Created";
    } else {
        echo "Error Creating Property: " . mysqli_error($conn); 
    }
} 

?>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Ruthless Real Estate</h2>

<?php include_once('../backend/menu.php'); ?>

<?php

    include("../backend/connection.php");
    //use the variable names in the include file
    $conn = new mysqli($host, $username, $password, $database);

    $dirname = "../property_images/";
    $images = glob($dirname."*.jpg");
    
    foreach($images as $image) {

        $imageName = substr(substr($image, 19), 0, -4);

        $result = mysqli_query($conn, "SELECT * FROM property WHERE image_name ='". $imageName. "';");
        $row = mysqli_fetch_array($result);
        echo $imageName;
        ?> 
        
        <tr>
            <td> <?php echo '<img src="'.$image.'" style="max-width:100px; min-width:100px;"/><br />'; ?> </td>
            <td> <?php echo $row['property_street']; ?> </td>
        </tr> <?php
        }
?>
</body>
</html> 
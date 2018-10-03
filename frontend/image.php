<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    if(!empty($_COOKIE["loggedin"])) {
        echo $_COOKIE["loggedin"];
    }
    else {
        header("location:../frontend/login.php");

    }
    ?>
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

        $prop = $row['property_street'] == '' ? "No Property associated with this image" : $row['property_street'];

        ?>


        <form method="post" action="../backend/modifyImage.php">
            <table>
        <tr>
            <td> <?php echo '<img src="'.$image.'" style="max-width:400px; max-height:400px;"><br />'; ?> </td>
            <td> <?php echo $prop; ?> </td>
            <td> <?php echo '<input type=submit value="Delete" name=delete>' ?> </td>
            <td> <?php echo '<input type=hidden value='.$imageName.' name=imgname>' ?> </td>
            <td> <?php echo '<input type=hidden value='.$image.' name=imgpath>' ?> </td

        </tr>
            </table>
        </form>
            <?php
        }
?>
</body>
</html> 
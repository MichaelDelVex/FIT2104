<html>
<head>
    <title>Property Results</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
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
<?php
include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
?>
<?php include_once('../backend/menu.php'); ?>

<?php



if (isset($_POST['Search'])) {

    if(!empty($_POST['property_type']) && !empty($_POST['property_suburb'])){
        $query = "SELECT * FROM property WHERE property_type LIKE $_POST[property_type] AND property_suburb LIKE '%$_POST[property_suburb]%' ORDER BY property_suburb";
    } else if(!empty($_POST['property_type'])) {
        $query = "SELECT * FROM property WHERE property_type LIKE '$_POST[property_type]' ORDER BY property_suburb";
    } else if(!empty($_POST['property_suburb'])) {
        $query = "SELECT * FROM property WHERE property_suburb LIKE '%$_POST[property_suburb]%' ORDER BY property_suburb";
    } else {

        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Please insert a property type and/or suburb');
    window.location.href='../frontend/property.php';
    </script>");
        return;
    }
    $result = mysqli_query($conn, $query);
    $propCount = mysqli_num_rows($result);

    if($propCount < 1){
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('No Properties were found that match your search criteria! Please try again');
    window.location.href='../frontend/property.php';
    </script>");
    } else {

        echo $propCount. " Properties found that match your search criteria.";

        while ($row = mysqli_fetch_array($result)) {
            ?>
                <table class=propertyView>
                <tr style="width: 150px;">
                    <td><?php echo $row['property_street'] ?> <?php echo $row['property_suburb'] ?> <?php echo $row['property_pc'] ?> <?php echo $row['property_state'] ?></td>
                    <th rowspan=4> <img src="../property_images/<?php echo $row['image_name'] ?>.jpg" style="max-height:400px; max-width:400px;"></th>
                </tr>
                <tr style="width: 150px;">
                    <td><?php echo $row['desc'] ?></td>
                </tr>
                <tr style="width: 150px;">
                    <td> Listed on : <?php echo $row['list_date'] ?></td>
                </tr>
                <tr style="width: 150px;">
                    <td>$<?php echo $row['list_price'] ?></td>
                </tr>
                </table>
            <?php
        }
        

    }
} else {
        echo "Error finding data" ;
}
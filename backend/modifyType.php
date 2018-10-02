<html>
<head>
<title>Modify and View Types</title>
</head>
<body>
<?php
include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
?>

<?php 

if (isset($_POST['delete'])) {
    $query="DELETE FROM type WHERE type_id LIKE $_POST[id]";

    if (mysqli_query($conn, $query)) {
        echo "Record deleted successfully";
        
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

} else if (isset($_POST['update'])) {
    
    $query=" UPDATE type SET type_name = '$_POST[name]'
    WHERE type_id LIKE $_POST[id];";

    if (mysqli_query($conn, $query)) {
        echo "Record updated successfully";
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

} else if (isset($_POST['add'])) {

    $query=" INSERT INTO type (type_name)
    VALUES ('$_POST[name]');";

    if (mysqli_query($conn, $query)) {
        echo "Type Sucessfully Created";
    } else {
        echo "Error Creating type: " . mysqli_error($conn); 
    }
} 

?>

</body>
</html>
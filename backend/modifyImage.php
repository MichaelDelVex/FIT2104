<html>
<head>
<title>View and Delete Images</title>
</head>
<body>
<?php
include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
?>

<?php 

if (isset($_POST['delete'])) {
    $query="UPDATE property SET image_name = '' WHERE image_name LIKE '$_POST[imgname]'";

    echo "name here";
    echo $_POST['imgname'];

    if (mysqli_query($conn, $query)) {
          echo ("<script LANGUAGE='JavaScript'>
    window.alert('Image removed');
    window.location.href='../frontend/image.php';
    </script>");

    unlink($_POST['imgpath']);
    

    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

?>

</body>
</html>
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
          echo ("<script LANGUAGE='JavaScript'>
    window.alert('type deleted');
    window.location.href='../frontend/type.php';
    </script>");

        
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

} else if (isset($_POST['update'])) {
    
    $query=" UPDATE type SET type_name = '$_POST[name]'
    WHERE type_id LIKE $_POST[id];";

    if (mysqli_query($conn, $query)) {
          echo ("<script LANGUAGE='JavaScript'>
    window.alert('Type updated');
    window.location.href='../frontend/type.php';
    </script>");

        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

} else if (isset($_POST['add'])) {

  if(empty($_POST['name'])){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Please insert a type');
    window.location.href='../backend/addType.php';
    </script>");
    }
    else{

    $query=" INSERT INTO type (type_name)
    VALUES ('$_POST[name]');";



    if (mysqli_query($conn, $query)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('type added');
    window.location.href='../frontend/type.php';
    </script>");
    } else {
        echo "Error Creating type: " . mysqli_error($conn); 
    }
    }
} 

?>

</body>
</html>
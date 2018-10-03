<html>
<head>
<title>Modify and View feature</title>
</head>
<body>
<?php
include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
?>

<?php 

if (isset($_POST['delete'])) {
    $query="DELETE FROM feature WHERE feature_id LIKE $_POST[id]";

    if (mysqli_query($conn, $query)) {
          echo ("<script LANGUAGE='JavaScript'>
    window.alert('feature deleted');
    window.location.href='../frontend/feature.php';
    </script>");

        
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

} else if (isset($_POST['update'])) {
    
    $query=" UPDATE feature SET feature_name = '$_POST[name]'
    WHERE feature_id LIKE $_POST[id];";

    if (mysqli_query($conn, $query)) {
          echo ("<script LANGUAGE='JavaScript'>
    window.alert('feature updated');
    window.location.href='../frontend/feature.php';
    </script>");

        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

} else if (isset($_POST['add'])) {

  if(empty($_POST['name'])){
    echo ("<script LANGUAGE='JavaScript'>
    window.alert('Please insert a feature');
    window.location.href='../backend/addfeature.php';
    </script>");
    }
    else{

    $query=" INSERT INTO feature (feature_name)
    VALUES ('$_POST[name]');";



    if (mysqli_query($conn, $query)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('feature added');
    window.location.href='../frontend/feature.php';
    </script>");
    } else {
        echo "Error Creating feature: " . mysqli_error($conn); 
    }
    }
} 

?>

</body>
</html>
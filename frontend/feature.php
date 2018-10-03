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
        header("location:login.php");

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
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $result = mysqli_query($conn,"SELECT * FROM feature");
        
        echo "<table border='1'>
        <tr>
        <th>Feature</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
            ?> 
            <form method="post" Action="../backend/modifyFeature.php">
            <tr id=<?php echo $row['feature_id'] ?> > <?php
            echo "<td>" ?> <input type=text name=name value="<?php echo $row['feature_name'] ?>"> <?php "</td>";
            echo "<td>" ?> <input type=submit value=SAVE name=update> <?php "</td>";
            echo "<td>" ?> <input type=submit value=DELETE name=delete> <?php "</td>";
            echo "<td>" ?> <input type=hidden name=id value=<?php echo $row['feature_id'] ?>> <?php "</td>";
            echo "</tr>"; ?>
            </form>
             <?php
        }
        echo "</table>";
        
        mysqli_close($conn);

    ?>

<p>
    <a href="../backend/showFeatureCode.html" target="_blank">
        <img src="../code_images/feature.JPG" >
    </a>
</p>

     
</body>

</html> 
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

    
<!-- CLIENT PAGE -->
<div id="Home" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h2>Client</h2>
    <button type="button" onclick="">View</button>
    <button type="button" onclick="">Add</button> 
    <button type="button" onclick="">Edit</button> 
    <button type="button" onclick="">Delete</button> 
    
    <h3>View clients</h3>
    
</div>

    <?php 
        include("../backend/connection.php");
        //use the variable names in the include file
        $conn = new mysqli($host, $username, $password, $database);
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $result = mysqli_query($conn,"SELECT * FROM client");
        
        echo "<table border='1'>
        <tr>
        <th>Client ID</th>
        <th>Given Name</th>
        <th>First Name</th>
        <th>Street</th>
        <th>State</th>
        <th>Suburb</th>
        <th>Postcode</th>
        <th>Email</th>
        <th>Mobile</th>
        <th>Mailing List</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
            ?> 
            <form method="post" Action="../backend/modifyClient.php">
            <tr id=<?php echo $row['client_id'] ?> > <?php
            echo "<td>" ?> <input type=text name=id value=<?php echo $row['client_id'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=gname value=<?php echo $row['client_gname'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=fname value=<?php echo $row['client_fname'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=street value=<?php echo $row['client_street'] ?> style="max-width:40px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=state value=<?php echo $row['client_state'] ?> style="max-width:40px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=suburb value=<?php echo $row['client_suburb'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=pc value=<?php echo $row['client_pc'] ?> style="max-width:40px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=email value=<?php echo $row['client_email'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=mobile value=<?php echo $row['client_mobile'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=mailinglist value=<?php echo $row['client_mailinglist'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=submit value=SAVE name=update> <?php "</td>";
            echo "<td>" ?> <input type=submit value=DELETE name=delete> <?php "</td>";
            echo "</tr>"; ?>
            </form>
             <?php
        }
        echo "</table>";
        
        mysqli_close($conn);

    ?>

<p>
    <a href="../backend/showClientCode.html" target="_blank">
        <img src="../code_images/client.JPG" >
    </a>
</p>
     
</body>
</html> 
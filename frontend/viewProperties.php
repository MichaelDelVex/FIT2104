<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Ruthless Real Estate</h2>

<?php include_once('../backend/menu.php'); ?>

    
<div id="Home" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h2>Client</h2>
    <button type="button" onclick="">View</button>
    <button type="button" onclick="">Add</button> 
    <button type="button" onclick="">Edit</button> 
    <button type="button" onclick="">Delete</button> 
    
    <h3>View Properties</h3>
    
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
        
        $result = mysqli_query($conn,"SELECT * FROM property");
        
        echo "<table border='1'>
        <tr>
        <th>Property ID</th>
        <th>Seller ID</th>
        <th>Property Type</th>
        <th>Street</th>
        <th>Suburb</th>
        <th>State</th>
        <th>Postcode</th>
        <th>List Price</th>
        <th>List Date</th>
        <th>Description</th>
        <th>Image Path</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
            ?> 
            <form method="post" Action="../backend/modifyProperty.php">
            <tr id=<?php echo $row['property_id'] ?> > <?php
            echo "<td>" ?> <input type=text name=id value=<?php echo $row['property_id'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=sellerid value=<?php echo $row['seller_id'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=type value=<?php echo $row['property_type'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=street value=<?php echo $row['property_street'] ?> style="max-width:40px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=suburb value=<?php echo $row['property_suburb'] ?> style="max-width:40px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=state value=<?php echo $row['property_state'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=pc value=<?php echo $row['property_pc'] ?> style="max-width:40px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=listprice value=<?php echo $row['list_price'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=listdate value=<?php echo $row['list_date'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=desc value=<?php echo $row['desc'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=imagename value=<?php echo $row['image_name'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=submit value=SAVE name=update> <?php "</td>";
            echo "<td>" ?> <input type=submit value=DELETE name=delete> <?php "</td>";
            echo "</tr>"; ?>
            </form>
             <?php
        }
        echo "</table>";
        
        mysqli_close($conn);

    ?>
     
</body>
</html> 
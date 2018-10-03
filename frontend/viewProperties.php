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
        <th>Property Type</th>
        <th>Street</th>
        <th>Suburb</th>
        <th>State</th>
        <th>Postcode</th>
        <th>List Price</th>
        <th>List Date</th>
        <th>Description</th>
        <th>Image File Name</th>
        <th>Current Image</th>
        </tr>";
        
        while($row = mysqli_fetch_array($result))
        {
            $propertyResult = mysqli_query($conn, "SELECT * FROM type");
            ?> 
            <form method="post" Action="../backend/modifyProperty.php"> 
            <td>
                <select name=type>
                    <?php 
                        while($propRow = mysqli_fetch_array($propertyResult)) {
                            echo "<option value=$propRow[type_id] ".($propRow['type_id'] == $row['property_type'] ? "selected=selected" : "") ."> $propRow[type_name] </option>";
                        }
                    ?>
                </select>
            </td>
            <?php
            echo "</td>";
            echo "<td>" ?> <input type=text name=street value="<?php echo $row["property_street"] ?>"> <?php "</td>";
            echo "<td>" ?> <input type=text name=suburb value="<?php echo $row['property_suburb'] ?>"> <?php "</td>";

            echo "<td>" ?> 
                <select name="state">
                    <option value="NSW"<?php if ($row['property_state'] == 'NSW') echo ' selected="selected"'; ?>>NSW</option>
                    <option value="NT"<?php if ($row['property_state'] == 'NT') echo ' selected="selected"'; ?>>NT</option>
                    <option value="QLD"<?php if ($row['property_state'] == 'QLD') echo ' selected="selected"'; ?>>QLD</option>
                    <option value="SA"<?php if ($row['property_state'] == 'SA') echo ' selected="selected"'; ?>>SA</option>
                    <option value="TAS"<?php if ($row['property_state'] == 'TAS') echo ' selected="selected"'; ?>>TAS</option>
                    <option value="VIC"<?php if ($row['property_state'] == 'VIC') echo ' selected="selected"'; ?>>VIC</option>
                    <option value="WA"<?php if ($row['property_state'] == 'WA') echo ' selected="selected"'; ?>>WA</option>
                </select> <?php 
                "</td>";
            echo "<td>" ?> <input type=text name=pc value=<?php echo $row['property_pc'] ?> style="max-width:70px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=listprice value=<?php echo $row['list_price'] ?> style="max-width:70px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=listdate value=<?php echo $row['list_date'] ?> style="max-width:70px"> <?php "</td>";
            echo "<td>" ?> <input type=text name=desc value="<?php echo $row['desc'] ?>"> <?php "</td>";
            echo "<td>" ?> <input type=text name=imagename value=<?php echo $row['image_name'] ?>> <?php "</td>";
            echo "<td>" ?> <img src="../property_images/<?php echo $row['image_name'] ?>.jpg" style="max-width:100px; max-height:100px;"> <?php "</td>";
            echo "<td>" ?> <input type=submit value=SAVE name=update> <?php "</td>";
            echo "<td>" ?> <input type=submit value=DELETE name=delete> <?php "</td>"; ?>
            <td> <input type='hidden' name='property_id' value=<?php echo $row['property_id'] ?>> </td> <?php
            echo "</tr>"; ?>
            </form>
             <?php
        }
        echo "</table>";
        
        mysqli_close($conn);

    ?>
     
</body>
</html> 
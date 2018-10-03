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
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        
        $result = mysqli_query($conn,"SELECT * FROM client");
        
        echo "<table border='1'>
        <tr>
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
            echo "<td>" ?> <input type=text name=gname value='<?php echo $row['client_gname'] ?>'> <?php "</td>";
            echo "<td>" ?> <input type=text name=fname value='<?php echo $row['client_fname'] ?>'> <?php "</td>";
            echo "<td>" ?> <input type=text name=street value='<?php echo $row['client_street'] ?>'> <?php "</td>";
            echo "<td>" ?> 
                <select name="state">
                    <option value="NSW"<?php if ($row['client_state'] == 'NSW') echo ' selected="selected"'; ?>>NSW</option>
                    <option value="NT"<?php if ($row['client_state'] == 'NT') echo ' selected="selected"'; ?>>NT</option>
                    <option value="QLD"<?php if ($row['client_state'] == 'QLD') echo ' selected="selected"'; ?>>QLD</option>
                    <option value="SA"<?php if ($row['client_state'] == 'SA') echo ' selected="selected"'; ?>>SA</option>
                    <option value="TAS"<?php if ($row['client_state'] == 'TAS') echo ' selected="selected"'; ?>>TAS</option>
                    <option value="VIC"<?php if ($row['client_state'] == 'VIC') echo ' selected="selected"'; ?>>VIC</option>
                    <option value="WA"<?php if ($row['client_state'] == 'WA') echo ' selected="selected"'; ?>>WA</option>
                </select> <?php 
                "</td>";
            echo "<td>" ?> <input type=text name=suburb value=<?php echo $row['client_suburb'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=pc value=<?php echo $row['client_pc'] ?> style="max-width:40px;"> <?php "</td>";
            echo "<td>" ?> <input type=text name=email value=<?php echo $row['client_email'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=mobile value=<?php echo $row['client_mobile'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=text name=mailinglist value=<?php echo $row['client_mailinglist'] ?>> <?php "</td>";
            echo "<td>" ?> <input type=submit value=SAVE name=update> <?php "</td>";
            echo "<td>" ?> <input type=submit value=DELETE name=delete> <?php "</td>";
            echo "<td>" ?> <input type=hidden name=id value='<?php echo $row['client_id'] ?>'> <?php "</td>";
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
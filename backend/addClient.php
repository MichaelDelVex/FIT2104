<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Ruthless Real Estate</h2>

<?php include_once('menu.php'); ?>

    
<!-- CLIENT PAGE -->
<div id="Home" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h2>Add New Client</h2>

    
    <!-- FORM TO ADD NEW CLIENT -->
    <form method="post" Action="modifyClient.php">
     Given name <input type="text" name="gname"> 
        <br>
     First name <input type="text" name="fname"> 
        <br>
     Street <input type="text" name="street"> 
        <br>
     Suburb <input type="text" name="suburb">
        <br>
     State <select name="state">
            <option value="NSW">NSW</option>
            <option value="NT">NT</option>
            <option value="QLD">QLD</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="VIC" selected="selected">VIC</option>
            <option value="WA">WA</option>
        </select>  
        <br>
     Postcode <input type="number" name="pc">
        <br>
     Email <input type="text" name="email">
        <br>
     Mobile <input type="text" name="mobile">
        <br>
        Mailig List? <select name="mailinglist">
            <option value="Y">Y</option>
            <option value="N" selected="selected">N</option>
        </select>
        <br>
        <input type=submit value="Create Client!" name=add>   
    
    </form>    
</div>

<?php 
    include("connection.php");
    //use the variable names in the include file
    $conn = new mysqli($host, $username, $password, $database);
    // Check connection
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $result = mysqli_query($conn,"SELECT * FROM client");
    

?>
     
</body>
</html> 
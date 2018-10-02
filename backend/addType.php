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

  <h2>Add New Type</h2>

    
    <!-- FORM TO ADD NEW CLIENT -->
    <form method="post" Action="modifyClient.php">
     Type Name <input type="text" name="name"> 
        <br>
        <input type=submit value="Create Type!" name=add>   
    
    </form>    
</div>
     
</body>
</html> 
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Ruthless Real Estate</h2>

<!-- THE TAB BAR -->
<div class="tab"> 
  <a href="home_page.html"><button>Home</button> </a>
  <a href="property.html"><button>Property</button> </a>
  <a href="client.php"><button>Client</button> </a>
  <a href="type.html"><button>Type</button> </a>
  <a href="addClient.php"><button>Add Client</button> </a>    
</div>

    
<!-- CLIENT PAGE -->
<div id="Home" class="tabcontent">
  <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
  <h2>Client</h2>
    <button type="button" onclick="">View</button>
    <button type="button" onclick="">Add</button> 
    <button type="button" onclick="">Edit</button> 
    <button type="button" onclick="">Delete</button> 
    
    <h3>View clients</h3>
    
    <!-- FORM TO ADD NEW CLIENT -->
<!-- <form action="/action_page.php">
     Given name <input type="text" name="Given name"> 
        <br>
     First name <input type="text" name="First name"> 
        <br>
     Street <input type="text" name="Street"> 
        <br>
     Suburb <input type="text" name="Suburb">
        <br>
     State <input type="text" name="State">
        <br>
     Postcode <input type="number" name="Postcode">
        <br>
     Email <input type="text" name="Email">
        <br>
     Mobile <input type="text" name="Mobile">
        <br>
     Mail list<input type="checkbox" name="Mail List" value="Mail List">
        <br>    
    
    </form>     -->
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
            <form method="post" Action="modifyClient.php">
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
    
<!-- FOOTER -->    
<div class="footer">
  <button class="tablinks" onclick="openTab(event, 'Home')" id="defaultOpen">Home</button>
  <button class="tablinks" onclick="openTab(event, 'Property')">Property</button>
  <button class="tablinks" onclick="openTab(event, 'Client')">Client</button>
  <button class="tablinks" onclick="openTab(event, 'Type')">Type</button>    
</div>
   

<script>

function deleteCustomer(id){
    alert("IT WORKS!")
    <?php
        include("connection.php");
        $id = $_POST["id"];
        $conn = new mysqli($host, $username, $password, $database);
        $query = "DELETE * FROM client WHERE client_id LIKE $id;";

        if (mysqli_query($conn, $query)) {
            echo $_POST["action"];
            echo "Record updated successfully";
            
        } else {
            echo "Error updating record: " . mysqli_error($conn);
            
        }
    ?>
}

function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
     
</body>
</html> 
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
    
<!-- FOOTER -->    
<div class="footer">
  <button class="tablinks" onclick="openTab(event, 'Home')" id="defaultOpen">Home</button>
  <button class="tablinks" onclick="openTab(event, 'Property')">Property</button>
  <button class="tablinks" onclick="openTab(event, 'Client')">Client</button>
  <button class="tablinks" onclick="openTab(event, 'Type')">Type</button>    
</div>
   

<script>

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
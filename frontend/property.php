<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<h2>Ruthless Real Estate</h2>

<?php include_once('../backend/menu.php');
?>

<!-- PROPERTY PAGE -->
<div id="Home" class="tabcontent">
    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
    <h3>Property</h3>

    <?php
    include("../backend/connection.php");
    //use the variable names in the include file
    $conn = new mysqli($host, $username, $password, $database);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    } else {
        $result = mysqli_query($conn, "SELECT * FROM type");
    }

    echo "<table border='1'>
    <tr>
    <th>Property type</th>
    <th>Suburb</th>
    </tr>";
?>

    <form method="post" Action="../backend/findProperty.php">
        <p>Search for a property type or suburb</p>
        <tr>
            <td>
                <select name=property_type>
                <?php 
                    echo "<option></option>";
                    while($row = mysqli_fetch_array($result)) {
                        echo "<option value=$row[type_id]> $row[type_name] </option>";
                    }
                ?>
                </select>
            </td>
            <td> <input type=text name=property_suburb > </td>
            <td> <input type=submit value=Search name=Search> </td>;
        </tr>
    </form>

<?php

echo "</table>";

    mysqli_close($conn);
    ?>




</div>


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
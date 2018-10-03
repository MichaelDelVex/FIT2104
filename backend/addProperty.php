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
    <h2>Add New Property</h2>


    <form method="post" Action="../backend/modifyProperty.php">
        <table
        <td  echo "</tr><?php
        echo "<td style='width: 150px'>" ?> Seller mobile number (please enter an exisiting number) <?php "</td>";
        echo "<td style='width: 100px'>" ?> <input type="number" name="mobile"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Property type* <?php "</td>";
        echo "<td>" ?> <select name="type">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Street* <?php "</td>";
        echo "<td>" ?> <input type="text" name="street"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Suburb <?php "</td>";
        echo "<td>" ?> <input type="text" name="suburb"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> State <?php "</td>";
        echo "<td>" ?> <select name="state">
            <option value="NSW">NSW</option>
            <option value="NT">NT</option>
            <option value="QLD">QLD</option>
            <option value="SA">SA</option>
            <option value="TAS">TAS</option>
            <option value="VIC" selected="selected">VIC</option>
            <option value="WA">WA</option>
        </select> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Postcode* <?php "</td>";
        echo "<td>" ?> <input type="number" name="pc"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Listing price* <?php "</td>";
        echo "<td>" ?> <input type="number" name="listprice"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Listing price* <?php "</td>";
        echo "<td>" ?> <input type="date" name="listdate"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Sale date <?php "</td>";
        echo "<td>" ?> <input type="date" name="saledate"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Description <?php "</td>";
        echo "<td>" ?> <input type="text" name="desc"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> Image name <?php "</td>";
        echo "<td>" ?> <input type="text" name="imagename"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> <?php "</td>";
        echo "<td>" ?> <input type=submit value="Create Property!" name=add> <?php "</td>";
        echo "</tr>"; ?>


        </table>
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

</html>
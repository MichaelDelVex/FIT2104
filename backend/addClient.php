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

<div id="Home" class="tabcontent">
    <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
    <h2>Add New Client</h2>



    <form method="post" Action="../backend/modifyClient.php">
        <table
        <td  echo "</tr><?php
            echo "<td style='width: 100px'>" ?> Given name* <?php "</td>";
            echo "<td style='width: 50px'>" ?> <input type="text" name="gname"> <?php "</td>";
            echo "</tr>"; ?><?php
            echo "<td>" ?> First name* <?php "</td>";
            echo "<td>" ?> <input type="text" name="fname"> <?php "</td>";
            echo "</tr>"; ?><?php
            echo "<td>" ?> Street* <?php "</td>";
            echo "<td>" ?> <input type="text" name="street"> <?php "</td>";
            echo "</tr>"; ?><?php
            echo "<td>" ?> Suburb* <?php "</td>";
            echo "<td>" ?> <input type="text" name="suburb"> <?php "</td>";
            echo "</tr>"; ?><?php
            echo "<td>" ?> State* <?php "</td>";
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
            echo "<td>" ?> Email* <?php "</td>";
            echo "<td>" ?> <input type="text" name="email"> <?php "</td>";
            echo "</tr>"; ?><?php
            echo "<td>" ?> Mobile* <?php "</td>";
            echo "<td>" ?> <input type="number" name="mobile"> <?php "</td>";
            echo "</tr>"; ?><?php
            echo "<td>" ?> Mailing List* <?php "</td>";
            echo "<td>" ?> <select name="mailinglist">
            <option value="Y">Y</option>
            <option value="N" selected="selected">N</option>
            </select> <?php "</td>";
            echo "</tr>"; ?><?php
        echo "<td>" ?> <?php "</td>";
        echo "<td>" ?> <input type=submit value="Create Client!" name=add> <?php "</td>";
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
<div class="footer" style="visibility:hidden;">
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
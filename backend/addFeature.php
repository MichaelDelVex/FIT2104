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
    <h2>Add New Feature</h2>


    <form method="post" Action="../backend/modifyFeature.php">
        <table
        <td  echo "</tr><?php
        echo "<td style='width: 50px'>" ?> Feature name* <?php "</td>";
        echo "<td style='width: 100px'>" ?> <input type="text" name="name"> <?php "</td>";
        echo "</tr>"; ?><?php
        echo "<td>" ?> <?php "</td>";
        echo "<td>" ?> <input type=submit value="Create Feature" name=add> <?php "</td>";
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

$result = mysqli_query($conn,"SELECT * FROM feature");



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
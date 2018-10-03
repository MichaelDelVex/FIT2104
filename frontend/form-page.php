<?php
        include("../backend/connection.php");
        //use the variable names in the include file
        $conn = new mysqli($host, $username, $password, $database);
        // Check connection
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $result = mysqli_query($conn,"SELECT client_email FROM client WHERE client_mailinglist like 'Y' ");?>


<!DOCTYPE html>
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

    <title>Form submission</title>
</head>
<body>
<h2>Ruthless Real Estate</h2>
<?php include_once('../backend/menu.php'); ?>

<form action="../backend/email.php" method="post">
    <p></p>
    Subject: <input type="text" name="subject"><br>
    Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
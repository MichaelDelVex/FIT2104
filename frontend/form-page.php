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
    <title>Form submission</title>
</head>
<body>

<form action="../backend/email.php" method="post">
    <p>Enter the </p>
    Subject: <input type="text" name="subject"><br>
    Message:<br><textarea rows="5" name="message" cols="30"></textarea><br>
    <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
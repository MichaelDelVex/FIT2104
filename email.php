
<?php


include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
// Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

    $from =  "From: Janet Fraser <janet.fraser@monash.edu.au>";
$query=  "SELECT client_email FROM client WHERE client_mailinglist like 'Y' ";
    $to =   mysqli_query($conn,$query);
    $msg =  $_POST["message"];
    $subject = $_POST["subject"];
    while($row = mysqli_fetch_array($to)){
        if(mail($row['client_email'], $subject, $msg, $from))
        {
            echo "Mail Sent";
        }
        else {
            echo "Error Sending Mail";
    }


}
?>

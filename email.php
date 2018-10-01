

<?php



    $from = "amri.mohideen@hotmail.com";
    $to = "amri.mohideen@hotmail.com";
    $msg = "test";
    $subject = "test";
    if(mail($to, $subject, $msg, $from))
    {
        echo "Mail Sent";
    }
    else {
        echo "Error Sending Mail";

}
?>

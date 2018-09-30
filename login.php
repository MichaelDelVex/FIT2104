<?php
session_start();
ob_start();
?>
<html>
<head>
    <title>Session Log In Example</title>
</head>
<link rel="stylesheet" type="text/css" href="style.css">
<body>
<?php
if(empty($_POST["uname"]))
{
    ?>
    <form method="post" action="6.php">
        <table border="0" align="center" width="30%" cellpadding="2" cellspacing="5">

            <tr>
                <td class="pref">Username</td>
                <td class="prefdisplaycentre"><input type="text" name="uname" size="12" maxlength="10"></td>
            </tr>
            <tr>
                <td class="pref">Password</td>
                <td class="prefdisplaycentre"><input type="password" name="pword" size="12" maxlength="10"></td>
            </tr>
            <tr>
                <td colspan="3" class="heading2" align="center">
                    <input type="submit" value="Login" name="Action">&nbsp;&nbsp;
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
    <?php
}
else
{
    include("connection.php");
    $conn = new mysqli("130.194.7.82", "s27840204", "monash00", "s27840204")
    or die("Couldn't log on to database");

    $query="SELECT given_name, family_name FROM authenticate WHERE username = username AND password = password";

    $stmt = mysqli_prepare($conn, $query);
    //echo $conn->error;

    $stmt->bind_param('ss', $uname,$pword);
    $uname= $_POST["uname"];
    $pword = hash('sha256', $_POST["pword"]);
    $stmt->execute();
    $stmt->bind_result($fname, $sname);
    console.log($stmt);
    if(!empty($stmt->fetch()))
    {
        echo "Welcome to our site $fname $sname";
        $_SESSION["access_status"] = "granted";
    }
    else
    {
        echo "Sorry, login details incorrect";
echo $query;}
}
?>
</body>
</html>
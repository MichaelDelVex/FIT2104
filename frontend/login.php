<?php
session_start();
ob_start();
?>
<html>
<head>
    <title>Log In</title>
</head>
<link rel="stylesheet" type="text/css" href="../styles/style_login.css">
<body>

<?php
if(empty($_POST["uname"]))
{
    ?>
    <h2 align="center">Welcome to Robin RealEstate</h2>
    <h3 align="center">Please enter your username and password</h3>
    <form method="post" action="login.php">
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
    include("../backend/connection.php");
    $conn = new mysqli($host, $username, $password, $database)
    or die("Couldn't log on to database");

    $query="SELECT given_name, family_name FROM authenticate WHERE username = ? AND password = ?";

    $stmt = mysqli_prepare($conn, $query);
    

    $stmt->bind_param('ss', $uname,$pword);
    $uname= $_POST["uname"];
    $pword = hash('sha256', $_POST["pword"]);
    $stmt->execute();
    $stmt->bind_result($fname, $sname);

    if(!empty($stmt->fetch()))
    {
        echo "Welcome to our site $fname $sname";
        $_SESSION["access_status"] = "granted";

        setcookie("loggedin", $uname);
        header("location: ../frontend/home_page.php");

    }
    else
    {
        echo "Sorry, login details incorrect";
    }
}
?>
</body>
</html>
<html>
<head>
<title>Modify and View Clients</title>
</head>
<body>
<?php
include("connection.php");
//use the variable names in the include file
$conn = new mysqli($host, $username, $password, $database);
?>

<?php 

if (isset($_POST['delete'])) {
    $query="DELETE FROM client WHERE client_id LIKE $_POST[id]";

    if (mysqli_query($conn, $query)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Client deleted');
    window.location.href='../frontend/client.php';
    </script>");
        
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }

} else if (isset($_POST['update'])) {
    
    $query=" UPDATE client SET client_gname = '$_POST[gname]', client_fname = '$_POST[fname]'
    , client_street = '$_POST[street]', client_state = '$_POST[state]', client_suburb = '$_POST[suburb]'
    , client_pc = '$_POST[pc]', client_email = '$_POST[email]' 
    , client_mobile = '$_POST[mobile]', client_mailinglist = '$_POST[mailinglist]'
    WHERE client_id LIKE $_POST[id];";

    if (mysqli_query($conn, $query)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Client updated');
    window.location.href='../frontend/client.php';
    </script>");
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

} else if (isset($_POST['add'])) {

    if(empty($_POST['gname']) || empty($_POST['gname']) || empty($_POST['street']) || empty($_POST['suburb']) || empty($_POST['state']) || empty($_POST['pc']) || empty($_POST['mobile'])  ){
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Please insert data where fields have *');
    window.location.href='../backend/addClient.php';
    </script>");
        return;
    }

    $query=" INSERT INTO client (client_gname, client_fname, client_street, client_state, client_suburb, client_pc, client_email, client_mobile, client_mailinglist)
    VALUES ('$_POST[gname]', '$_POST[fname]', '$_POST[street]', '$_POST[state]', '$_POST[suburb]', '$_POST[pc]', '$_POST[email]', '$_POST[mobile]', '$_POST[mailinglist]');";

    if (mysqli_query($conn, $query)) {
        echo ("<script LANGUAGE='JavaScript'>
    window.alert('Client added');
    window.location.href='../frontend/client.php';
    </script>");
    } else {
        echo "Error Creating Client: " . mysqli_error($conn); 
    }
} 

?>

</body>
</html>
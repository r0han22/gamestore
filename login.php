<?php
include('assets/include/dbconnect.php');

if (isset($_POST['user_id']) and isset($_POST['user_pass'])) {

    // Assigning POST values to variables.
    $username = $_POST['user_id'];
    $password = $_POST['user_pass'];

    // CHECK FOR THE RECORD FROM TABLE
    $query = "SELECT * FROM `users` WHERE username='$username' and password='$password'";

    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $ret = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);
    if ($ret['username'] == $username and $ret['password'] == $password and $count == 1) {
        echo '<script type="text/javascript">alert("Login Credentials verified");s</script>';
        header('Location: welcome.html');
    } else {
        echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
        header('Location: 404.html');
    }
}
?>
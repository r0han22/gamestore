<?php
include('assets/include/dbconnect.php');
$username = $_POST['user_id'];
$password = $_POST['user_pass'];
$email = $_POST['user_eid'];
$query = "SELECT * FROM `users`";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$ret = mysqli_fetch_array($result);
if (!empty($username) and !empty($password) and !empty($email)) {
if ($ret['username'] == $username and $ret['password'] == $password) {
    echo "<script type='text/javascript'>alert('User Already Exists')</script>";
    header('Location: 404.html');
} else {
    $sql = "INSERT INTO users(username,password,email_id) VALUES('$username','$password','$email')";
    if (mysqli_query($connection, $sql)) {
        header('Location: index.html');
    } else {
        header('Location: 404.html');
    }
}
}
else {
    header('Location: 404.html');
}
?>

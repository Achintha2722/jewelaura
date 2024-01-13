<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $conn = mysqli_connect("localhost", "root", "", "jewelaura_db");

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $nic = mysqli_real_escape_string($conn, $_POST['nic']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "INSERT INTO users (userName, address, nic, email, password) VALUES ('$userName', '$address', '$nic', '$email', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo $_SESSION['Email'] = $email;
        header("location: signin.html");
    } else {
        echo "ERROR: Hush! Sorry, Invalid Login Credentials. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
?>

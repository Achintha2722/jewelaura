<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    $conn = mysqli_connect("localhost", "root", "", "jewelaura_db");

    // Check connection
    if ($conn === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Validation
    $errors = array();

    if (empty($firstName)) {
        $errors['firstName'] = 'First Name is required.';
    }

    if (empty($lastName)) {
        $errors['lastName'] = 'Last Name is required.';
    }

    if (empty($email)) {
        $errors['email'] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format.';
    }

    if (empty($mobile)) {
        $errors['mobile'] = 'Mobile is required.';
    } elseif (!preg_match('/^\d{10}$/', $mobile)) {
        $errors['mobile'] = 'Mobile must have 10 numbers.';
    }

    if (empty($message)) {
        $errors['message'] = 'Message is required.';
    }

    // If there are validation errors, send them back to the form
    if (!empty($errors)) {
        session_start();
        $_SESSION['errors'] = $errors;
        header("Location: contact.php");
        exit;
    }

    // Proceed with the database insertion
    $sql = "INSERT INTO contacts (firstName, lastName, email, mobile, message) VALUES ('$firstName', '$lastName', '$email', '$mobile', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo $_SESSION['Email'] = $email;
        header("location: index.html");
    } else {
        echo "ERROR: Unable to insert data. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
?>

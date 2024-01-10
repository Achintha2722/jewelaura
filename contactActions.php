<?php
        if (isset($_POST["submit"])) {
           $firstName = $_POST["first_name"];
           $lastName = $_POST["last_name"];
           $email = $_POST["email"];
           $mobile = $_POST["mobile"];
           $message= $_POST["message"];
           
           $errors = array();
           
           if (empty($firstName) OR empty($laststName) OR empty($email) OR empty($mobile) OR empty($message)) {
            array_push($errors,"All fields are required");
           }
           if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is not valid");
           }
           if (strlen($mobile)<10) {
            array_push($errors,"Mobile must be at least 10 charactes long");
           }

           // Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// $userName = $_REQUEST['userName'];
        // $address = $_REQUEST['address'];
        // $nic = $_REQUEST['nic'];
        // $email = $_REQUEST['email'];		
		// $password = $_REQUEST['password'];
		

		$sql = "INSERT INTO contacts VALUES ('$id','$firstName','$lastName','$email','$mobile','$message')";

		
		if(mysqli_query($conn, $sql)){
			// echo $_SESSION['Email'] = $Email;
			header("location:signin.html");
		} else{
			// echo "ERROR: Hush! Sorry, Invalid Login Credentials. $sql. "
			// 	. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);

        //    require_once "connection.php";
            
        //    $sql = "INSERT INTO contacts (first_name, last_name, email, mobile, message) VALUES ( ?, ?, ?, ?, ? )";
        //    $stmt = mysqli_stmt_init($conn);
        //    $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        //    if ($prepareStmt) {
        //         // mysqli_stmt_bind_param($stmt,"sss",$fullName, $email, $passwordHash);
        //         mysqli_stmt_execute($stmt);
        //         echo "<div class='alert alert-success'>Thank you for contact us.</div>";
        //    }else{
        //         die("Something went wrong");
        //    }
        }
        ?>
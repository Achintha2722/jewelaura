<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => 
		$conn = mysqli_connect("localhost", "root", "", "jewel_aura_db");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		$userName = $_REQUEST['userName'];
        $address = $_REQUEST['address'];
        $nic = $_REQUEST['nic'];
        $email = $_REQUEST['email'];		
		$password = $_REQUEST['password'];
		

		$sql = "INSERT INTO users VALUES ('$id','$userName','$address','$nic','$email','$password')";

		
		if(mysqli_query($conn, $sql)){
			echo $_SESSION['Email'] = $Email;
			header("location:signin.html");
		} else{
			echo "ERROR: Hush! Sorry, Invalid Login Credentials. $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection test
		mysqli_close($conn);
		?>

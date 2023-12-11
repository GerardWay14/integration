<?php
session_start();
require_once 'conn.php';


if (isset($_POST["register"])) {
	if ($_POST["username"] != "" && $_POST["email"] != "" && $_POST["phonenumber"] != "" && $_POST["password"] != "") {
		try {
			$username = $_POST["username"];
			$email = $_POST["email"];
			$phonenumber = $_POST["phonenumber"];
			$password = $_POST["password"];

			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = "INSERT INTO member (username, email, phonenumber, password) 
					    VALUES ('$username', '$email', '$phonenumber', '$password')";

			$conn->exec($sql);
		} catch (PDOException $e) {
			echo $e->getMessage();
		}

		echo '<div class="message" style="text-align:center;">User successfully created!</div>';
		$_SESSION['message'] = array("text" => "User successfully created!", "alert" => "Info: ");
		$conn = null;

		header('location:login.php');
	} else {
		echo "
				<script>alert('Please fill up the required field!')</script>
				<script>window.location = 'register.php'</script>
			";
	}
}
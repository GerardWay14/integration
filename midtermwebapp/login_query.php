<?php
session_start();

require_once 'conn.php';

if (isset($_POST['login'])) {
	if ($_POST['username'] != "" && $_POST['password'] != "") {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM `member` WHERE `username`=? AND `password`=?";

		$query = $conn->prepare($sql);
		$query->execute(array($username, $password));

		$row = $query->rowCount();
		$fetch = $query->fetch();

		if ($row > 0) {
			$_SESSION['user'] = $fetch['mem_id'];
			header("location: intro.php");
		} else {
			echo "
				<script>alert('Invalid username or password!')</script>
				<script>window.location = 'login.php'</script>
				";
		}
	} else {
		echo "
				<script>alert('Please enter username and password!')</script>
				<script>window.location = 'login.php'</script>
			";
	}
}
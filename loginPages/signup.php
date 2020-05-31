<?php
  $userFname = $_POST['userFname'];
  $userLname = $_POST['userLname'];
	$userEmail = $_POST['userEmail'];
  $userEmailconfirm = $_POST['userEmailconfirm'];
	$userPass = $_POST['userPass'];
  $userPassconfirm = $_POST['userPassconfirm'];

	$connect = new mysqli('localhost','root','teamVERM123!','efc');
	if($connect->connect_error){
		echo "$connect->connect_error";
		die("Connection Failed : ". $connect->connect_error);
	} else {
		$statement = $connect->prepare("insert into signup(userFname, userLname, userEmail, userEmailconfirm, userPass, userPassconfirm) values(?, ?, ?, ?, ?, ?)");
		$statement->bind_param("ssssii", $userFname, $userLname, $userEmail, $userEmailconfirm, $userPass, $userPassconfirm);
		$execval = $statement->execute();
		header("Location: ../loginPages/loginPage.html");
		die();

		$statement->close();
		$connect->close();
	}
?>

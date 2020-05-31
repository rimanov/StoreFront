<?php
	$userEmail = $_POST['userEmail'];
	$userPass = $_POST['userPass'];

	$connect = new mysqli('localhost','root','teamVERM123!','efc');
	if($connect->connect_error){
		echo "$connect->connect_error";
		die("Connection Failed : ". $connect->connect_error);
	} else {
		$statement = $connect->prepare("insert into login(userEmail, userPass) values(?, ?)");
		$statement->bind_param("ss", $userEmail, $userPass);
		$execval = $statement->execute();
		header("Location: ../");
		die();

		$statement->close();
		$connect->close();
	}
?>

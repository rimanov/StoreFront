<?php
	$forgotEmail = $_POST['forgotEmail'];

	$connect = new mysqli('localhost','root','teamVERM123!','efc');
	if($connect->connect_error){
		echo "$connect->connect_error";
		die("Connection Failed : ". $connect->connect_error);
	} else {
		$statement = $connect->prepare("insert into forgot(forgotEmail) values(?)");
		$statement->bind_param("s", $forgotEmail);
		$execval = $statement->execute();
		header("Location: ../");
		die();

		$statement->close();
		$connect->close();
	}
?>

<?php
	$fullname = $_POST['fullname'];
	$orderno = $_POST['orderno'];
	$email = $_POST['email'];
	$country = $_POST['country'];
	$issue = $_POST['issue'];

	// Database connection
	$connect = new mysqli('localhost','root','teamVERM123!','efc');
	if($connect->connect_error){
		echo "$connect->connect_error";
		die("Connection Failed : ". $connect->connect_error);
	} else {
		$statement = $connect->prepare("insert into contact(fullname, orderno, email, country, issue) values(?, ?, ?, ?, ?)");
		$statement->bind_param("sssss", $fullname, $orderno, $email, $country, $issue);
		$execval = $statement->execute();
		header("Location: ../");
		die();

		$statement->close();
		$connect->close();
	}
?>

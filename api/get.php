<?php 
	include_once("db.php");

	if (isset($_POST["id"]) && !empty($_POST["id"])){
		Get($_POST["id"]);
	}

	function Get($id){
		GLOBAL $con;

		$sql = "SELECT * FROM users WHERE id=?";
		$st=$con->prepare($sql);

		$st->execute(array($id));//encrypt password
		$row=$st->fetchAll();
		if (count($row) == 1){
			
			echo "ID:".$row[0]['id'] . "|Name:".$row[0]['username']. "|Level:".$row[0]['level']. "|Exp:".$row[0]['exp'] . "|Match:".$row[0]['match']. ";";
			//echo "SERVER: ID#".$all[0]["id"]." - ".$all[0]["username"]." - ".$all[0]["level"]." - ".$all[0]["exp"]." - ".$all[0]["match"];
			exit();
		}

		//if username or password are empty strings
		echo "SERVER: error, invalid username or password";
		exit();
	}

	//if username or password is null (not set)
	echo "SERVER: error, enter a valid username & password";

	//exit():  means end server connection (don't execute the rest)
?>
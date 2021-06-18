<?php 
    include_once("db.php");
    
    $id = $_POST["id"];
    $level = $_POST["level"];
    $exp = $_POST["exp"];
    $match = $_POST["match"];

	if (isset($_POST["id"]) && !empty($_POST["id"])){

		Update($_POST["level"],$_POST["exp"], $_POST["match"], $_POST["id"]);
	}

	function Update($level, $exp, $match, $id){
		GLOBAL $con;

		$sql = "UPDATE `users` SET `level` = ? , `exp` = ?, `match` = ? WHERE `id` = ?";
		$st=$con->prepare($sql);

		$st->execute(array($level,$exp,$match,$id));
		$all=$st->fetchAll();
		if (count($all) == 1){
			echo "SERVER: ID#".$all[0]["id"]." - ".$all[0]["username"];
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
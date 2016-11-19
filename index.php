<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="bootstrap/css/jumbotron-narrow.css">
<script src="js/jquery-3.1.1.min.js"></script>
<script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
<?php
session_start();
include("function.php");

require_once 'medoo.php';
include 'config.php';
loadheader();


if ($_SESSION["user"] == NULL){
	if ($_GET["user"] != NULL){
		if ($database->has("users",["Name" => $_GET["user"]])==false){
			$_SESSION["user"] = $_GET["user"];
			$_SESSION["poeng"] = 0;
			$_SESSION["hint"] = array();
			$database->insert('users',[
				"Name" => $_SESSION["user"],
				"task" => 1,
				"poeng" => 0,
			]);
		}
		else {loadpanel("danger","error","Brukernavet er opptatt");}
	}
}

if(($_GET["hint"]) == 1){
	$_SESSION["hint"][$_SESSION["task"]] = 1;
	$hint = 1;
}
else{
	$hint = 0;
}

if(isset($_GET["svar"])){
	$id = $_SESSION["task"];
	$svar = $_GET["svar"];
	$check = taskcheck($id,$svar);
	$poeng = taskreward($id);
	if($id < $config["tasks"]){
		if($check == TRUE){
			$_SESSION["task"]++;
			$_SESSION["poeng"] = pointcalc($_SESSION["poeng"], $poeng, $config["hint"], $hint);
			$database->update("users",[
				"task" => $_SESSION["task"],
				"poeng" => $_SESSION["poeng"],
			],["Name" => $_SESSION["user"]]);
		}
		else{$error = "Feil svar!!!";}
	}

	else{
		$error = "FERDIG!";
		if($database->has("finish",["user" => $_SESSION["user"]]) == false){
			$_SESSION["task"]++;
			$_SESSION["poeng"] = $_SESSION["poeng"] + $poeng;
			$time = time();
			$database->insert("finish",[
				"user" => $_SESSION["user"],
				"time" => $time,
//				"poeng" => $_SESSION["poeng"]
			]);
		}
	}
}


if(isset($_SESSION['user'])){
	if($id < $config["tasks"]){
	if(isset($_SESSION['task'])){

		loadtask($_SESSION['task'],$error);
	}
	else{
		loadtask(1);
		$_SESSION["task"] = 1;
	}
	}
	else {
	loadfinish();
	}
}
else{

	loadpage("userform");

}
if($_GET["debug"] == "restart"){session_destroy();}
if($_GET["debug"] == "session"){var_dump($_SESSION);}
//DEBUG//
//var_dump($_SESSION);
//session_destroy();

?>
</div>
</body>
</html>

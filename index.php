<?php
session_start();
include("function.php");

require_once 'medoo.php';
include 'config.php';



if ($_SESSION["user"] == NULL){
	if ($_GET["user"] != NULL){
		if ($database->has("users",["Name" => $_GET["user"]])==false){
			$_SESSION["user"] = $_GET["user"];
			$_SESSION["poeng"] = 0;
			$database->insert('users',[
				"Name" => $_SESSION["user"],
				"task" => 1,
				"poeng" => 0,
			]);
		}
		else {echo "brukernavn opptatt";}
	}
}

if(isset($_GET["svar"])){
	$id = $_SESSION["task"];
	$svar = $_GET["svar"];
	$check = taskcheck($id,$svar);
	$poeng = taskreward($id);
	if($id < $config["tasks"]){
		if($check == TRUE){
			$_SESSION["task"]++;
			$_SESSION["poeng"] = $_SESSION["poeng"] + $poeng;
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
//DEBUG//
//var_dump($_SESSION);
//session_destroy();

?>


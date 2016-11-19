<?php
//side handtering
//
//include("config.php");
function pagedecode($p) {
	if($p != NULL){
		$P = urldecode($p);	
		$p = base64($p,1);
		$p = removeshit($p);
		return $p;
	}
	else{
		$p = 1;
	return $p;
	}
}

function loadpage($p){
	include("page.php");
	switch ($p):
		case "userform":
			echo $userform;
			break;
		case "taskform":
			echo $taskform;
			break;
		case "hintform":
			echo $hintform;
			break;
		case "finish":
			echo $finish;
			break;

		default:
	endswitch;

}
function loadtask($id,$error){
	include("task.php");
	taskhead($id, $task[$id]["task"],$task[$id]["hint"],$error);
	loadpage("taskform");
	if($_SESSION["hint"][$id] != 1){
		loadpage("hintform");
	}
}
function taskhead($id,$task,$hint,$error){
	echo "<div class=\"jumbotron\">";
	echo "<h1>Oppgave ".$id."</h1>";
	echo "<h2>".$task."</h2>";
	if(isset($error)){
		echo "<h3>".$error."</h3>";
	}

	if($_SESSION["hint"][$id] == 1){
		print "<h3>Hint:</h3>";
		print "<h4>".$hint."</h4>";
	}
	echo "</div>";
//	$poeng = taskreward($id);
//	echo "<h3>Poeng:".$poeng."</h3>";
}

function taskcheck($id,$svar){
	include("task.php");
	if($svar == $task[$id]["key"]){
		return TRUE;
	}
	else{return FALSE;}
}

function taskreward($id){
	include("task.php");
	return $task[$id]["poeng"];
}

function pointcalc($poeng,$value,$config,$hint){
	if($hint = 1){
	$r = $poeng + ($value/$config);
	}
	else{
		$r = $poeng + $value;
	}	
	return $r;

}

function loadfinish(){
loadpage("finish");
}


//sikkerhet
function removeshit($shit){
	return $shit;
}

//encodere og dekodere
function base64($d,$m){
	if($m == "1"){
		$r = base64_decode($d);
	}
	else{
	$r = base64_encode($d);
	}

	if($r != false){
		return $r;
	}
}

?>

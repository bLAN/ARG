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
		default:
	endswitch;

}
function loadtask($id,$error){
	include("task.php");
	taskhead($id, $task[$id]["task"],$error);
	loadpage("taskform");
}
function taskhead($id,$task,$error){
	echo "<h1>Oppgave ".$id."</h1>";
	echo "<h2>".$task."</h2>";
	if(isset($error)){
	echo "<h3>".$error."</h3>";
	}
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


function loadfinish(){
echo "GRATULERER du kan no følge med vidare her :D";
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

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
function loadheader($user, $poeng){
	include("config.php");
	echo "<div class=\"header clearfix\">";
	echo "<div class=\"nav nav-pills pull-right\">";
	if($user){
		echo "<span class=\"glyphicon glyphicon-user\" aria-hidden=\"true\"> ".$user."  </span>";
		echo "<p><span class=\"glyphicon glyphicon-stats\" aria-hidden=\"true\"> ".$poeng."</span></p>";
	}
	echo "</div>";
	echo "<h3 >".$config["name"]."</h3>";
	echo "</div>";

}
function loadheaderscore($users){
	include("config.php");
	echo "<div class=\"header clearfix\">";
	echo "<div class=\"nav nav-pills pull-right\">";
	if($users){
		echo "<span class=\"glyphicon glyphicon-user\" aria-hidden=\"true\"> ".$users."  </span>";
	}
	echo "</div>";
	echo "<h3 >".$config["name"]."</h3>";
	echo "</div>";

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
function loadpanel($type,$head,$content){
	print "<div class=\"panel panel-".$type."\">" ;
	print "<div class=\"panel-heading\">".$head."</div>";
	if($content){
		print "<div class=\"panel-body\">".$content."</div>";
	}
	print "</div>";
}
function loadalert($type,$head){
	print "<div class=\"alert alert-".$type."\">" ;
	print "<span class=\"glyphicon glyphicon-exclamation-sign pull-left\" aria-hidden=\"true\"></span>";
	print $head;
	print "<span class=\"glyphicon glyphicon-exclamation-sign pull-right\" aria-hidden=\"true\"></span>";
	print "</div>";
}

function loadprogress($c,$m){
	$p = ($c / $m) * 100;
	print '<div class="progress">';
	print ' <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$p.'" aria-valuemin="0" aria-valuemax="100" style="width: '.$p.'%">';
	print '<span class="sr-only"> '.$p.'% Complete</span>';
	print '</div>';
	print '</div>';
}

function loadtask($id,$error){
	include("task.php");
	if($task[$id]["type"] == "text"){
		taskheadtext($id, $task[$id]["task"],$task[$id]["hint"],$error);
		loadpage("taskform");
		if($_SESSION["hint"][$id] != 1){
			loadpage("hintform");
		}
	}
	elseif($task[$id]["type"] == "image"){
		taskheadimage($id, $task[$id]["task"],$task[$id]["hint"],$error);
		loadpage("taskform");
		if($_SESSION["hint"][$id] != 1){
			loadpage("hintform");
		}
	}
	elseif($task[$id]["type"] == "url"){
		taskheadurl($id, $task[$id]["task"],$task[$id]["hint"],$error);
		loadpage("taskform");
		if($_SESSION["hint"][$id] != 1){
			loadpage("hintform");
		}
	}
}

function taskheadurl($id,$task,$hint,$error){
	echo "<div class=\"jumbotron\">";
	echo "<h1>Oppgave ".$id."</h1>";
	echo "<a href=$task>$task</a>";
	if(isset($error)){
		loadalert("danger",$error);
	}

	if($_SESSION["hint"][$id] == 1){
		loadpanel("info","Hint",$hint);
	}
	echo "</div>";
}
function taskheadimage($id,$task,$hint,$error){
	echo "<div class=\"jumbotron\">";
	echo "<h1>Oppgave ".$id."</h1>";
	echo "<img src=task/image/$task></h2>";
	if(isset($error)){
		loadalert("danger",$error);
	}

	if($_SESSION["hint"][$id] == 1){
		loadpanel("info","Hint",$hint);
	}
	echo "</div>";
}
function taskheadtext($id,$task,$hint,$error){
	echo "<div class=\"jumbotron\">";
	echo "<h1>Oppgave ".$id."</h1>";
	echo "<h2>".$task."</h2>";
	if(isset($error)){
		loadalert("danger",$error);
	}

	if($_SESSION["hint"][$id] == 1){
		loadpanel("info","Hint",$hint);
	}
	echo "</div>";
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
	loadpage("finish");
}


function loadscoreboard(){
	include "config.php";
	echo "<div class=\"jumbotron\">";
	echo "<h3> Top score </h3>";
	echo "<table class=\"table\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Bruker</th>";
	echo "<th>Oppgave</th>";
	echo "<th>Poeng</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

	$query = "SELECT * FROM `users` ORDER BY `poeng` DESC";
	$datas = $database->query($query)->fetchAll();

	//var_dump($datas);

	foreach($datas as $data)
	{
		if($database->has("finish",["user" => $data["Name"]]) == TRUE){
			echo "<tr class=\"success\">";
			echo "<td>".$data["Name"]." </td><td> FERDIG!</td><td>". $data["poeng"]."</td>";
			echo "</tt>";
		}
		else{
			echo "<tr>";
			echo "<td>".$data["Name"]." </td><td>".$data["task"]." </td><td>". $data["poeng"]."</td>";
			echo "</tt>";
		}
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
}


function loadsvarboard(){
	include "config.php";
	echo "<div class=\"jumbotron\">";
	echo "<h3> Siste svar </h3>";
	echo "<table class=\"table\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Bruker</th>";
	echo "<th>Oppgave</th>";
	echo "<th>Svar</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

	$query = "SELECT * FROM `svar` ORDER BY `id` DESC LIMIT 18";
	$datas = $database->query($query)->fetchAll();

	//var_dump($datas);

	foreach($datas as $data)
	{
			echo "<tr>";
			echo "<td>".$data["user"]." </td><td>".$data["task"]." </td><td>". $data["svar"]."</td>";
			echo "</tt>";
	}
	echo "</tbody>";
	echo "</table>";
	echo "</div>";
}

function topcounter(){
	include "config.php";
	$count = $database->count("users");
	return $count;
}


// kalkulasjonar
function pointcalc($poeng,$value,$config,$hint){
	if($hint == 1){
		$r = $poeng + ($value/$config);
	}
	else{
		$r = $poeng + $value;
	}
	return $r;

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

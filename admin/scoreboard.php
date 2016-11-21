<?php

require_once '../medoo.php';
include "../config.php";
include "../function.php";

?>

<html>
    <head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap-superhero.css">
		<link rel="stylesheet" href="../bootstrap/css/jumbotron-narrow.css">
		<link rel="stylesheet" href="../css/spinners.css">
		<script src="../js/jquery-3.1.1.min.js"></script>
		<script src="../bootstrap/js/bootstrap.js"></script>
		<title><?php echo $config["name"];?></title>
		<script>
$(function(){
   setInterval(function(){$("#score").load("stats.php")},5000);
})
		</script>
    </head>
    <body>
        <div class="container">
		<div id="score">
	<div id="score">
<div class="header clearfix">
<div class="nav nav-pills pull-right">
<span class="glyphicon glyphicon-user" aria-hidden="true">   </span><span class="loading open-circle"></span></span>
</div>
<h3>Erviker ARG 0.1.0.0</h3>
</div>
<div class="jumbotron">
<h3> Top score </h3>
<table class="table">
<thead>
<tr>
<th>Bruker</th>
<th>Oppgave</th>
<th>Poeng</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
<h3><span class="loading words"></span></h3>
</div>
</div>
</div>
</div>
</body></title>
</head>
</html>

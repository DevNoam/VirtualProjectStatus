<?php
	$ConnectedplayersFile = './ConnectedPlayers.txt';
	$curConnectedplayers = (int) file_get_contents($ConnectedplayersFile);
    $curData = (int) $_POST["curActivePlayers"];
    $upTime = $_POST["upTime"];
    
	file_put_contents($ConnectedplayersFile, "$curData \n$upTime");
?>
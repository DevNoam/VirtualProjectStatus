<?php 

$activePlayerValue = '0';
$uptime;

$file = 'ConnectedPlayers.txt';

$serverActive = true;

ActivePlayers();
LastFetch($file, $activePlayerValue);
UpTime();

date_default_timezone_set('Asia/Jerusalem');

function ActivePlayers(){
    $file = file_get_contents('ConnectedPlayers.txt');
    global $activePlayerValue;
    $stringArr = explode("\n", $file);
    $activePlayerValue = $stringArr[0];
}

function LastFetch(&$file, &$activePlayerValue){
    $now = strtotime("-2 minutes");
    if ($now > filemtime($file))
    {
        // echo 'expired';
        return "<b><u style='color:red';>SERVER IS OFFLINE</u></b> <br /> 
        1. Last ping from the server: " . date ("d/M/Y H:i (", filemtime($file)) . date_default_timezone_get() . ') <br />
        ' . '2. Current server zone time: ' . date("d/M/Y H:i (") . date_default_timezone_get() . ')';
        $serverActive = false;
    }else
    {
        
        // echo 'Vaild';
        return "<b><u style='color:#00e613';>ONLINE</u></b> <br />
        1. There are $activePlayerValue connected players <br/ > 
        2. Last ping from the server " . date ("d/M/Y H:i (", filemtime($file)) . date_default_timezone_get() . ') <br />  
        3. Server uptime: ' . UpTime($file);
        $serverActive = true;
    }
}

function UpTime()
{
    $file = file_get_contents('ConnectedPlayers.txt');
    global $upTime;
    $stringArr = explode("\n", $file);
    $upTime = $stringArr[1];
    return $upTime;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <title>Virtual Project</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="font-family:Arial, Helvetica, sans-serif;">
<div class="position">
    <img src="ProjectLogo.png" class="center">
    <h1 style="text-align: center; color: white;"><u>Server status:</u></h1>
    <br>
    <div class="info">
    <p style="text-align: center; font-size: 28px; color: white;"><?php echo LastFetch($file, $activePlayerValue); ?></p>
    </div>

<br>
<hr>
    <footer style="text-align: center; font-size: 20px; color: white">This is a status page for <a href="#" style="color:aliceblue">Virtual Project</a> Server.</footer>
</div>
</body>
</html>
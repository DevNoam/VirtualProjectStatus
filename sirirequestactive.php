<?php
$file = "ConnectedPlayers.txt";
$lines = explode(" ", file_get_contents($file));
$now = strtotime("-2 minutes");

    if ($now > filemtime($file))
    {
        // echo 'expired';
        echo 'The server is currently inactive.'; 
    }
    else
    {

        $serverUptime = "Server running straight for Unkown time.";
        if($lines[2] >= 1)
        {
            //If server running for days
            $serverUptime = "Server is up and running for $lines[2] $lines[1] and $lines[4] $lines[3].";
            if($lines[4] == 0)
            {
                $serverUptime = "Server is up and running for $lines[2] $lines[1].";
            }
        }
        else if($lines[2] == 0 && $lines[4] > 0)
        {
            //If server running for hours
            $serverUptime = "Server is up and running for $lines[4] $lines[3].";
        }
        else
        {
            //If server running for Minutes
            $serverUptime = "Server is up and running for $lines[6] $lines[5].";
        }

        if($lines[0] == 0)
        {
            echo "There are no active players at the moment.";
            echo "</br> $serverUptime";
        }
        else if($lines[0] == 1)
        {
            echo "There is currently 1 active player in the server.";
            echo "</br> $serverUptime";

        }
        else
        {
        echo "There are currently $lines[0] active players in the server.";
        echo "</br> $serverUptime";
       }
    }
?>
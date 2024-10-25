<?php
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Headers: *");
         $connection = @fsockopen('virtualproject.noamsapir.me', 7778);

        checkActive(TRUE);


        function startServer()
        {
            $connection = ssh2_connect('admin.noamsapir.me', 22);
            ssh2_auth_password($connection, 'LINUXUSER', 'PASSWORD');

            $stream = ssh2_exec($connection, 'cd ~/VirtualProject/;./start.sh');  
            echo "Checking if server has started..";
        }

        function checkActive($runServer)
        {
            global $connection;
            if (is_resource($connection))
            {
                echo 'Server is open.';
                fclose($connection);
            }
            else
            {
                echo 'Server is closed. </br>';
                if($runServer == TRUE)
                {
                    startServer();
                }
                fclose($connection);
            }
        }
?>
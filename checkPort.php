<?php
        header("Access-Control-Allow-Origin: *");
        $connection = @fsockopen('virtualproject.noamsapir.me', 7778);

            if (is_resource($connection))
            {
                echo 'Open';
                fclose($connection);
            }
            else
            {
                echo 'Closed';
                fclose($connection);
            }
?>
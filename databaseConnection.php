<?php

    $conn = mysqli_connect("localhost","root","password","twitterApp");
    if(!$conn)
    {
        echo "Database not connected!" . mysqli_connect_error();
    }

?>

<?php
   // create connection
    $conn = mysqli_connect('localhost','root','','php_blog');

    if(mysqli_connect_errno()){

        echo 'Failed to connect to mysql';
    }

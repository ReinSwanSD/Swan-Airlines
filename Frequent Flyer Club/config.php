<?php


    $connString = "mysql:host=localhost; dbname=skyward_aviation";
    $user="username";
    $pass="123";

    $pdo=new pdo($connString,$user,$pass);

    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);//useful during initial development and debugging



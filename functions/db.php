<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "medical_project";

$connection_database = mysqli_connect($server, $username, $password, $dbname);

if(!$connection_database):
    die("Error In connection Is : " . mysqli_connect_errno());
endif;


function insertAdmin($sql) {
    global $connection_database;
    $result = mysqli_query($connection_database, $sql);
    if($result):
        return "Added Success";
    else:
        return false;
    endif;
}
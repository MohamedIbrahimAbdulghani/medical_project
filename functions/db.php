<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "medical_project";

$connection_database = mysqli_connect($server, $username, $password, $dbname);

if($connection_database === false):
    die("Error In connection Is : " . mysqli_connect_errno());
endif;


function insertAdmin($sql) {
    global $connection_database;
    $result = mysqli_query($connection_database, $sql);
    if($result === true):
        return "Added Success";
    else:
        return false;
    endif;
}


function login($email, $password) {
    global $connection_database;
    $select_user = "SELECT * FROM `admins` WHERE `admin_email` = '$email' && `admin_password` = '$password' ";
    $query = mysqli_query($connection_database, $select_user);
    $result = mysqli_fetch_assoc($query);
    return $result;
}
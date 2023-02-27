<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "medical_project";

$connection_database = mysqli_connect($server, $username, $password, $dbname);

if($connection_database === false):
    die("Error In connection Is : " . mysqli_connect_errno());
endif;


function insertData($sql) {
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

function getRows($table) {
    global $connection_database;
    $sql = "SELECT * FROM `$table` ";
    $result = mysqli_query($connection_database, $sql);
    if($result):
        $rows = [];
        if(mysqli_num_rows($result) > 0):
            while($row = mysqli_fetch_assoc($result)):
                $rows[] = $row;
            endwhile;
        endif;
        return $rows;
    endif;
}

function getRow($table, $field,$id)
{
    global $connection_database;
    $sql = "SELECT * FROM `$table` WHERE `$field`='$id' ";
    $result = mysqli_query($connection_database,$sql);

    if($result) {
        $rows = [];
        if(mysqli_num_rows($result) > 0) {
            $rows[] = mysqli_fetch_assoc($result);
            return $rows[0];
        }
    }
    return false;

}

function updateData($sql) {
    global $connection_database;
    $result = mysqli_query($connection_database, $sql);
    if($result) {
        return "Update Data";
    } else {
        return false;
    }
}
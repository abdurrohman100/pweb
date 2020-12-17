<?php

function open_connection() {
    $con = new mysqli("localhost", "root", "");
    if ($con->connect_errno) {
        printf("Connect failed: %s\n", $con->connect_errno);
        exit();
    }

    if (!$con->select_db('pweb_kuis')) {
        echo "Could not select database" . $con->error;
        echo MSG_EOF;
        if (!$con->query("CREATE DATABASE IF NOT EXISTS pweb_kuis;")) { 
            echo "Could not create database: " . $con->error;
        }
        $con->select_db('pweb_kuis');
    }

    return $con;
}

function close_connection(mysqli $con) {
    $con->close();
}

?>
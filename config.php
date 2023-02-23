<?php

session_start();

define("BURL", "http://localhost:8080/medical_project/");
// define("BURLA", "http://localhost:8080/medical_project/admins/");
// define("ASSETS", "http://localhost:8080/medical_project/assets/");
define("BURLA", BURL . "admins/");
define("ASSETS", BURL . "assets/");

// define("BL", __DIR__ . "/");
// define("BLA",__DIR__ . "/admins/");
define("BL", __DIR__ . "/");
define("BLA",__DIR__ . "/admins/");

// to connect database
require_once BL . "functions/db.php";

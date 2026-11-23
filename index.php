<?php
include_once "bdd.php";
include_once "utility.php";
require_once("crud/activite.php");



get("/activities", function ($param) {
    $conn = db();
    return getAllActivities($conn); 
});


get("/activities/:activitieId", function ($param) {
    $conn = db();
    $activitie_id = $param['activitieId'];
    return getActivitie($conn, $activitie_id); 
});





get("/learners/:learnerId", function ($param) {
    $learner_id = $param['learnerId'];
    
});

put("/learners/:learnerId", function () {
    $_PUT = read_put();
    $user_pwd = $_PUT['password'];
});

header("HTTP/1.0 404");

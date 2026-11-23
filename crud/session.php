<?php


function getSession($conn, $session_id){
    $sql = "SELECT * FROM Activite JOIN `Session` ON Session.id_activite = Activite.id WHERE id = $session_id";
    $result = mysqli_query($conn, $sql);
    return rsToAssoc($result);
}
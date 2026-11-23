<?php

    // function addTicket($conn, $user_id, $category, $title, $message){
    //     $sql = "INSERT INTO tickets (user_id, category, titre, message) VALUES ('$user_id', '$category', '$title', '$message')";
    //     return mysqli_query($conn, $sql);
    // }

    function getAllActivities($conn){
        $sql = "SELECT * FROM Activite";
        $result = mysqli_query($conn, $sql);
        return rsToAssoc($result);
    }

    function getActivitie($conn, $activite_id){
        $sql = "SELECT * FROM Activite WHERE id = $activite_id";
        $result = mysqli_query($conn, $sql);
        return rsToAssoc($result);
    }

    // function deleteTicket($conn, $id){
    //     $sql="DELETE FROM tickets WHERE id = $id";
    //     $result = mysqli_query($conn, $sql);
    //     return $result;
    // }


    function rsToAssoc($rs){
        //Change un résultSet en tableau associatif
        $tab=[] ; 
        while($row=mysqli_fetch_assoc($rs)){
            $tab[]=$row ;	
        }
        return $tab;
    } 

?>
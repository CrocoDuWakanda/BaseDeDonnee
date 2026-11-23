<?php

    function getAllActivities($conn){
        $sql = "SELECT * FROM Activite";
        $result = mysqli_query($conn, $sql);
        return rsToAssoc($result);
    }

    function getActivitie($conn, $activite_id){
        $sql = "SELECT * FROM Activite WHERE id = $activite_id";
        $result = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    function deleteActivitie($conn, $id){
        $sql="DELETE FROM Activite WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    function updateActivite($conn, $id, $nom, $cout, $syllabus){
		$sql="UPDATE `recettes` SET `nom`='$nom', `cout`='$cout', `syllabus`='$syllabus WHERE id = $id"; 
		$result=mysqli_query($conn, $sql) ; 
		return $result ; 
	}
    
    // function addActivitie($conn, $user_id, $category, $title, $message){
    //     $sql = "INSERT INTO tickets (user_id, category, titre, message) VALUES ('$user_id', '$category', '$title', '$message')";
    //     return mysqli_query($conn, $sql);
    // }

?>
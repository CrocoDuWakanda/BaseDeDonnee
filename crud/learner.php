<?php

    function addLearner($conn, $nom, $prenom, $groupe) {
        $nom = mysqli_real_escape_string($conn, $nom);
        $prenom = mysqli_real_escape_string($conn, $prenom);
        $groupe = (int) $groupe;
        $sql = "INSERT INTO Etudiant (nom, prenom, num_grp) VALUES ('$nom', '$prenom', $groupe)";
        mysqli_query($conn, $sql);
    }

    function getLearner($conn, $id) {
        $id = (int) $id;
        $sql = "SELECT nom, prenom, num_etu, num_grp FROM Etudiant WHERE num_etu = $id";
        $resultat = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($resultat);
    }

    function updateLearnerPassword($conn, $id, $motDePasse) {
        $id = (int) $id;
        $hash = password_hash($motDePasse, PASSWORD_DEFAULT);
        $hash = mysqli_real_escape_string($conn, $hash);
        $sql = "UPDATE Etudiant SET mot_de_passe = '$hash' WHERE num_etu = $id";

        mysqli_query($conn, $sql);
    }

    function updateLearnerState($conn, $id, $etat) {
        $id = (int) $id;
        $etat = mysqli_real_escape_string($conn, $etat);
        $sql = "UPDATE Etudiant SET etat = '$etat' WHERE num_etu = $id";

        mysqli_query($conn, $sql);
    }

?>
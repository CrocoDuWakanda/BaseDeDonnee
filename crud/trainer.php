<?php

    function getTrainer($conn, $id) {
        $id = (int) $id;
        $sql = "SELECT num_ens, nom, prenom FROM Enseignant WHERE num_ens = $id";
        $resultat = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($resultat);
    }

?>
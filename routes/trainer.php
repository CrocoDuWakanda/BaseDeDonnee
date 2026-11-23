<?php

    get("/trainers/:trainer_id", function ($param) {
        $id = (int) $param['trainer_id'];
        $enseignant = getTrainer(db(), $id);

        if ($enseignant === null) {
            return ["error" => "L'enseignant est introuvable"];
        }

        return [
            "id" => $enseignant['num_ens'],
            "firstName" => $enseignant['prenom'],
            "lastName" => $enseignant['nom']
        ];
    });

?>
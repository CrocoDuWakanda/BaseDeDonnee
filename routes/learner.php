<?php

    post("/learners", function () {
        $data = json_decode(file_get_contents("php://input"), true);
        
        $nom = (string) $data['nom'];
        $prenom = (string) $data['prenom'];
        $groupe = (int) $data['num_grp'];

        addLearner(db(), $nom, $prenom, $groupe);
        return ["status" => "ok"];
    });

    get("/learners/:learnerId", function ($param) {
        $id = (int) $param['learnerId'];
        return getLearner(db(), $id);
    });

    put("/learners/:learnerId", function ($param) {
        $data = read_put();
        
        $id = (int) $param['learnerId'];
        $motDePasse = (string) $data['learnerMdp'];

        updateLearnerPassword(db(), $id, $motDePasse);
        return ["status" => "ok"];
    });

    put("/learners/:learnerId/:state", function ($param) {
        $id = (int) $param['learnerId'];
        $etat = $param['state'];

        updateLearnerState(db(), $id, $etat);
        return ["status" => "ok"];
    });

?>
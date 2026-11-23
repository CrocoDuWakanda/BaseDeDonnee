<?php
include_once "bdd.php";
include_once "utility.php";
require_once("crud/activite.php");
require_once("crud/session.php");



get("/activities", function ($param) {
    $conn = db();
    return getAllActivities($conn); 
});


get("/activities/:activitieId", function ($param) {
    $conn = db();
    $activitie_id = $param['activitieId'];
    return getActivitie($conn, $activitie_id); 
});


get("/activities/:activitieId/session/:sessionId", function ($param) {
    $conn = db();
    $session_id = $param['sessionId'];
    return getSession($conn, $session_id); 
});

post("/activities/:activitieId/marks", function ($param) {
    $activitie_id = $param['activitieId'];
});

post("/activities/:activitieId/comments", function ($param) {
    $activitie_id = $param['activitieId'];
});

post("/activities/:activitieId/sessions/:sessionId", function ($param) {
    $activitie_id = $param['activitieId'];
    $session_id = $param['sessionId'];
});


delete("/activities/:activitieId/marks", function ($param) {
    $activitie_id = $param['activitieId'];
});

delete("/activities/:activitieId/comments", function ($param) {
    $activitie_id = $param['activitieId'];
});

delete("/activities/:activitieId/sessions/:sessionId", function ($param) {
    $activitie_id = $param['activitieId'];
    $session_id = $param['sessionId'];
});







//base de donnee
$baseDeDonnee = db();

//ELEVES

//creer un eleve

post("/learners", function () use ($baseDeDonnee) {
    $data = json_decode(file_get_contents("php://input"), true);
    $learner_nom = (string) $data['nom'];
    $learner_prenom = (string) $data['prenom'];
    $learner_groupe = (int) $data['num_grp'];

    $sql = "INSERT INTO Etudiant (nom, prenom, num_grp)
            VALUES ('$learner_nom', '$learner_prenom', $learner_groupe)";

    mysqli_query($baseDeDonnee, $sql);

    return ["status" => "ok"];

});

//avoir un eleve avec son id

get("/learners/:learnerId", function ($param) use ($baseDeDonnee) {
    $learner_id = (int) $param['learnerId'];
    $sql = "SELECT  nom, prenom, num_etu, num_grp FROM Etudiant WHERE num_etu = $learner_id";
    $resultat = mysqli_query($baseDeDonnee, $sql);
    return mysqli_fetch_assoc($resultat);
});

//modifier le mdp de l'eleve

put("/learners/:learnerId", function ($param) use ($baseDeDonnee) {
    $_PUT = read_put();

    $learner_id = (int) $param['learnerId'];
    $user_pwd = (string) $_PUT['learnerMdp'];
    $sql = "UPDATE Etudiant SET mot_de_passe = $user_pwd WHERE num_etu = $learner_id";
    $resultat = mysqli_query($baseDeDonnee, $sql);
    return ["status" => "ok"];
});

//modifier l'etat d'un eleve

put("/learners/:learnerId/:state", function ($param) use ($baseDeDonnee) { 

    $learner_id = (int) $param['learnerId'];
    $user_etat = (string) $_PUT['learnerEtat'];
    $sql = "UPDATE Etudiant SET etat = $user_etat WHERE num_etu = $learner_id";

});

// trainer

get("/trainers/:trainer_id", function($param) {

    $bdd = db();

    $id = $param['trainer_id'];

    $sql = "SELECT num_ens, nom, prenom FROM Enseignant WHERE num_ens=$id";

    $result = mysqli_query($bdd, $sql);

    if ($row = mysqli_fetch_assoc($result)) {
        return [
            "id" => $row['num_ens'],
            "firstName" => $row['prenom'],
            "lastName" => $row['nom']
        ];
    }

    return ["error" => "L'enseignant est introuvable"];
});


header("HTTP/1.0 404");

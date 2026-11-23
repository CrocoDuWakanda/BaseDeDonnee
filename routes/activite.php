<?php

    get("/activities", function ($param) {
        return getAllActivities($db()); 
    });


    get("/activities/:activitieId", function ($param) {
        $activitie_id = $param['activitieId'];
        return getActivitie($db(), $activitie_id); 
    });


    get("/activities/:activitieId/session/:sessionId", function ($param) {
        $session_id = $param['sessionId'];
        return getSession($db(), $session_id); 
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


?>
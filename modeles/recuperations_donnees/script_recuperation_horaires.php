<?php


require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../config.php';
$pdo = new PDO(DB_DSN, DB_USER, DB_PASSWORD);




try{

    $myTable = $pdo->query("SELECT jour, statut, ouverture_midi, fermeture_midi, ouverture_soir, fermeture_soir FROM horaires");
    $myTable->execute();
    $rows = $myTable->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e){
    echo 'il y a une erreur:'.$e->getMessage();
}



foreach ($rows as $row) {
    if ($row['jour'] === 'Lundi') {
        $mondayDay = $row['jour'];
        $mondayOpeningDay = $row['statut'];
        $mondayOpeningNoon = $row['ouverture_midi'];
        $mondayClosingNoon = $row['fermeture_midi'];
        $mondayOpeningEvening = $row['ouverture_soir'];
        $mondayClosingEvening = $row['fermeture_soir'];
        break;
    }
}
    foreach ($rows as $row) {
        if ($row['jour'] === 'Mardi') {
            $tuesdayDay = $row['jour'];
            $tuesdayOpeningDay = $row['statut'];
            $tuesdayOpeningNoon = $row['ouverture_midi'];
            $tuesdayClosingNoon = $row['fermeture_midi'];
            $tuesdayOpeningEvening = $row['ouverture_soir'];
            $tuesdayClosingEvening = $row['fermeture_soir'];
            break;
        }
    }

        foreach ($rows as $row) {
            if ($row['jour'] === 'Mercredi') {
                $wednesdayDay = $row['jour'];
                $wednesdayOpeningDay = $row['statut'];
                $wednesdayOpeningNoon = $row['ouverture_midi'];
                $wednesdayClosingNoon = $row['fermeture_midi'];
                $wednesdayOpeningEvening = $row['ouverture_soir'];
                $wednesdayClosingEvening = $row['fermeture_soir'];
                break;
            }
        }

            foreach ($rows as $row) {
                    if ($row['jour'] === 'Jeudi') {
                        $thursdayDay = $row['jour'];
                        $thursdayOpeningDay = $row['statut'];
                        $thursdayOpeningNoon = $row['ouverture_midi'];
                        $thursdayClosingNoon = $row['fermeture_midi'];
                        $thursdayOpeningEvening = $row['ouverture_soir'];
                        $thursdayClosingEvening = $row['fermeture_soir'];
                        break;
                    }
            }

                foreach ($rows as $row) {
                    if ($row['jour'] === 'Vendredi') {
                        $fridayDay = $row['jour'];
                        $fridayOpeningDay = $row['statut'];
                        $fridayOpeningNoon = $row['ouverture_midi'];
                        $fridayClosingNoon = $row['fermeture_midi'];
                        $fridayOpeningEvening = $row['ouverture_soir'];
                        $fridayClosingEvening = $row['fermeture_soir'];
                        break;
                    }
                }

                    foreach ($rows as $row) {
                        if ($row['jour'] === 'Samedi') {
                            $saturdayDay = $row['jour'];
                            $saturdayOpeningDay = $row['statut'];
                            $saturdayOpeningNoon = $row['ouverture_midi'];
                            $saturdayClosingNoon = $row['fermeture_midi'];
                            $saturdayOpeningEvening = $row['ouverture_soir'];
                            $saturdayClosingEvening = $row['fermeture_soir'];
                            break;
                        }
                    }

                        foreach ($rows as $row) {
                            if ($row['jour'] === 'Dimanche') {
                                $sundayDay = $row['jour'];
                                $sundayOpeningDay = $row['statut'];
                                $sundayOpeningNoon = $row['ouverture_midi'];
                                $sundayClosingNoon = $row['fermeture_midi'];
                                $sundayOpeningEvening = $row['ouverture_soir'];
                                $sundayClosingEvening = $row['fermeture_soir'];
                                break;
                            }
                        }












<?php

class controles
{
    public function pageAdmin(): void{

         require_once 'vues/affiche_page_Admin.php';
    }
    public function pageConnexion(): void{

        require_once 'vues/affiche_connexion.php';

    }
    public function pageReservation(): void{

        require_once 'vues/affiche_reservations.php';

    }
    public function pageTest(): void{

        require_once 'vues/affichepagetest.php';

    }
    public function pageAccueil(): void{

        require_once 'vues/affiche_accueil.php';

    }
    public function pageCarte(): void{

        require_once 'vues/affiche_carte_et_menus.php';

    }
    public function pageA_propos(): void{

        require_once 'vues/affiche_apropos.php';

    }

}
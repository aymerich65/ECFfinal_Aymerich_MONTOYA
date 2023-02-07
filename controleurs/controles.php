<?php

class controles
{
    public function pageAdmin(): void{

         require_once 'vues/affiche_formulaires.php';
    }
    public function pageConnexion(): void{

        require_once 'vues/boutons_connexion_inscription.php';

    }
}
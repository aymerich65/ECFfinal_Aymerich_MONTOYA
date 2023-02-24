<?php

var_dump($_SESSION);
?>
<div class="container-fluid headerstyle">
    <div class="row d-flex align-items-center">
        <div class="col-8 titrestyle">
            <h1>QuaiAntique</h1>
        </div>
        <div class="col-4 text-end">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle btn-transparent dropdown-toggle-noarrow" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-list"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="index.php?page=réservation">Réservation</a></li>
                    <li><a class="dropdown-item" href="index.php?page=connexion">Connexion</a></li>
                    <li><a class="dropdown-item" href="index.php?page=carte">Carte</a></li>
                    <li><a class="dropdown-item" href="index.php?page=contact">Contact</a></li>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'approuved'): ?>
                        <li><a class="dropdown-item" href="index.php?page=admin">Page administrateur</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
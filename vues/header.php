<?php

?>
<div class="container-fluid headerstyle">
    <div class="row d-flex align-items-center">
    <div class="col-8 titrestyle">
  <h1 class="headertitlestyle">QuaiAntique</h1>
  <h2 class="headerlink"><a href="index.php?page=accueil"><span>Accueil</span></a></h2>
  <h2 class="headerlink"><a href="index.php?page=réservation"><span>Réservation</span></a></h2>
  <h2 class="headerlink"><a href="index.php?page=connexion"><span>Connexion</span></a></h2>
  <h2 class="headerlink"><a href="index.php?page=carte"><span>Carte</span></a></h2>
  <h2 class="headerlink"><a href="index.php?page=contact"><span>Contact</span></a></h2>
  <h2 class="headerlink"><a href="index.php?page=a_propos"><span class="aproposestyle">A propos</span></a></h2>
</div>

        <div class="col-4 text-end">
            <div class="dropdown ">
                <button class="btn btn-secondary dropdown-toggle btn-transparent dropdown-toggle-noarrow" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-list"></i>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li><a class="dropdown-item" href="index.php?page=accueil">Accueil</a></li>
                    <li><a class="dropdown-item" href="index.php?page=réservation">Réservation</a></li>
                    <li><a class="dropdown-item" href="index.php?page=connexion">Connexion</a></li>
                    <li><a class="dropdown-item" href="index.php?page=carte">Carte</a></li>
                    <li><a class="dropdown-item" href="index.php?page=contact">Contact</a></li>
                    <?php if(isset($_SESSION['admin']) && $_SESSION['admin'] == 'approuved'): ?>
                        <li><a class="dropdown-item" href="index.php?page=admin">Page administrateur</a></li>
                    <?php endif; ?>
                    <li><a class="dropdown-item" href="index.php?page=a_propos">A propos</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

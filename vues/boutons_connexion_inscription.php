<?php
ob_start();
?>

<div class="connexionstyle">
    <h1>Connexion/Inscription</h1>
    <div>
        <form method="post">
            <button class="btn"><input type="submit" name="connexion" value="Connexion" ></button>
            <button class="btn"><input type="submit" name="inscription" value="Inscription" ></button>
        </form>
    </div>


    <?php if(isset($_POST['connexion'])){?>
        <div class="">
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="email">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Indiquez votre adresse email">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Indiquez votre mot de passe">
                    </div>
                </div>
                <button type="submit">Valider</button>
            </form>
        </div>
    <?php } elseif(isset($_POST['inscription'])){ ?>
        <div class="">
            <form method="post">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="email">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Indiquez votre adresse email">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Indiquez votre mot de passe">
                    </div>
                    <div class="form-group col-md-12">
                        <label for="guests">Convives par défaut</label>
                        <input type="number" class="form-control" id="guests" name="guests" placeholder="Indiquez le nombre de convives par défaut">
                    </div>
                </div>
                <button type="submit">Valider</button>
            </form>
        </div>
  <?php }

$contenu =ob_get_clean();

require_once 'layout.php';


<?php session_start()?>
<?php

if(isset($_SESSION['logged_in']) !== true|| !isset($_SESSION['logged_in']))
{?>
    <form method="POST" action="">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email">Adresse Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Indiquez votre adresse email">
            </div>
            <div class="form-group col-md-6">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Indiquez votre mot de passe">
            </div>
        </div>
    </form>
    <?php
}else{

    echo 'Bienvenue cher client';


}

if(isset($_SESSION['logged_in'])){
    echo "Bonjour utilisateur'.$email. comment allez vous?";
}




if(isset($_POST['submit'])){
    $email=$_POST['email'];
    $password = $_POST['password'];
        if($email === $_SESSION['email'] && password_verify($password, $_SESSION['password'])){
        $_SESSION['logged_in'] === true;

    } else {
        echo 'Identifiants incorrectes ';
    }







}





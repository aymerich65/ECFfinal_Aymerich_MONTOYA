<div class="mainstyle formstyle">
    <?php
if(!isset($_POST['submit'])){?>

            <form method="POST" action="">
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

<?php }


if(isset ($_POST['submit'])){
    $email=$_POST['email'];
    $password = $_POST['password'];

if($email === $_SESSION['email'] && password_verify($password, $_SESSION['password'])){
    $_SESSION['logged_in'] === true;
    echo 'Bienvenue cher client';
} else {
echo 'Identifiants incorrectes veuillez réessayer ';}}


?>
</div>
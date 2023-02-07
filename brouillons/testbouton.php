<form method="post">
    <button class="btn"><input type="submit" name="connexion" value="Connexion" ></button>
    <button class="btn"><input type="submit" name="inscription" value="Inscription" ></button>
</form>

<?php if(isset($_POST['connexion'])){?>
    <div class="connexion-bloc">
        <p>phrase une Connexion</p>
    </div>
<?php } elseif(isset($_POST['inscription'])){ ?>
    <div class="inscription-bloc">
        <p>phrase deux Inscription</p>
    </div>
<?php } ?>
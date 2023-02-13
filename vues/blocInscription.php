
            <form method="POST" action="modeles/insertionsdonnees/traitementInscription.php" class="formstyle">
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
                        <input type="number" class="form-control" id="convives" name="convives" placeholder="Indiquez le nombre de convives par défaut">
                    </div>
                </div>
                <button type="submit">Valider</button>
           </form>


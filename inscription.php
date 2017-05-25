<!DOCTYPE html>
<html lang="fr">
  <?php include("en_tete.php"); ?>
<nav id="inscription">
    <div class="formulaire_inscription">
        <h1>Rejoignez le club Premium !</h1>
        <ul>
            <h2>Formulaire d'inscription - Accès Premium</h2>
            <form method="post" action="recherchePremium.php">
                <fieldset>
                    <legend>Veuillez remplir tous les champs :</legend>
                    Prénom :<br>
                    <input type="text" name="prenom" value="NULL">
                    <br>
                    Nom :<br>
                    <input type="text" name="nom">            
                    <br>
                    Pseudo :<br>
                    <input type="text" name="pseudo" value="NULL">            
                    <br>
                    Mail :<br>
                    <input type="text" name="mail">
                    <br>
                    Mot de passe :<br>
                    <input type="password" name="mdp">
                    <br>
                    <!-- Envoyer nbEvalsCompltes=0 a reductions -->
                    <input type="hidden" name="nbEvalsCompletes" value="0" />
                    <input type="submit" value="S'inscrire" onclick="window.location.href='recherchePremium.php?pseudo&amp;prenom&amp;mdp'"> <!-- redirection vers recherchePremium-->
                    <br>
                </fieldset>
            </form>
        </ul>
    </div>
</nav>

    <?php include("pied_de_page.php"); ?>
  </body>
</html
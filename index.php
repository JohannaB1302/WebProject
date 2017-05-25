<!DOCTYPE html>
<html lang="fr">
<?php include("en_tete.php"); ?>
<!-- Voir sur http://fr.php.net/manual/fr/funcref.php la bibliothèque des fonctions php -->
<body>
  <header>
    <h1>Accédez dès maintenant à Indé-Couvertes !</h1>     
    <nav id="selection_accès">
        <div class="option_accès">
        <h2>Choisissez votre accès</h2>
        <p>
        Vous pouvez accéder à Indé-Couvertes en tant que simple visiteur, ou <strong style="color: red">bénéficier des avantages du club Premium</strong>. Il suffit de vous inscrire !<br>
        </p>
        <ul>
        <!--redirection vers recherche-->
        <li><a href="recherche.php">Simple visite</a></li>
        <!--redirection vers le formulaire d'inscription-->
        <li><a href="inscription.php">M'inscrire</a></li>
        <!--redirection vers identificationPremium-->
        <li><a href="identificationPremium.php">Je suis déjà membre Premium</a></li><br><br>
          </ul>
        </div>
    </nav>
    </header>
    <?php   // Une fonction préexistante qui envoie un fichier sur un serveur
            // Une fonction préexistante qui envoie un mail avec PHP
            // Une fonction préexistante qui crypte des mots de passe
            // Enregistrons les informations de date dans des variables pour le journal des activités récentes
            ?>
            <br>
          </fieldset>
        </form>
      </ul>
      <?php include("pied_de_page.php"); ?>
    </body>
</html>

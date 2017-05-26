<!--Contient les fonctionnalités de recherche réservées aux memebres Premium-->
<!DOCTYPE html>
<html lang="fr">
<?php include("en_tete.php"); ?>
<?php include("profil.php"); ?>
<?php include("avantagesPremium.php"); ?>

<body>
  <?php // On crée notre array $membrePremium et on protège le code HTML en retirant les balises
    $membrePremium = array (
    'P' => strip_tags($_COOKIE['pseudo']),
    'N' => strip_tags($_COOKIE['nom']),
    'Pré' => strip_tags($_COOKIE['prenom']),
    'M' => strip_tags($_COOKIE['mail']),
    'MDP' => strip_tags($_COOKIE['mdp']),
    'NEC' => strip_tags($_COOKIE['nbEvalsCompletes']));
    if (isset($_POST['pseudo']) AND isset($_POST['mdp']))// On a le pseudo et le mdp
    {
      if ($_POST['pseudo'] == $_COOKIE['pseudo'] AND $_POST['mdp'] == $_COOKIE['mdp']) // Si le mot de passe est bon
      {
        echo 'Bonjour ', $_POST['pseudo'], ' !<br>';
      }
      else
      {
        echo "Mot de passe erroné";
      }
    }
    else // Il manque des paramètres, on avertit le visiteur
    {
        echo 'Il faut renseigner votre pseudo et un mot de passe !';
    }?>

  <?php include("recherche.php"); // Voir comment enlever connexion.php ?>
  <dl>
    <dt></dt>
    <dd></dd>
  </dl>

  </body>
</html>
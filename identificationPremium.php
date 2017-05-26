<!-- Utiliser la fonction setcookie() pour gérer la connexion du membre et réduire les risques de faille XSS sur le site-->
<?php setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
setcookie('mdp', $hash, time() + 365*24*3600, null, null, false, true);
//Ces informations sont placées dans la superglobale  $_COOKIE ?>
<!DOCTYPE html>
<html lang="fr">
<?php include("en_tete.php"); ?>

<body>
  <nav id="selection_accès">
    <div class="option_accès">
      <h1>Identifiez-vous pour accéder à votre espace Premium</h1>       
      <ul>
        <h2>Identification - Accès Premium</h2>
        <form method="post" action="recherchePremium.php">
          <fieldset>
            <legend>Veuillez remplir tous les champs :</legend>
            Pseudo :<br>
            <input type="text" name="pseudo">
            <br>
            Mot de passe :<br>
            <input type="password" name="mdp">
            <br>
            <input type="submit" value="Accéder à l'espace Premium" onclick="window.location.href='recherchePremium.php?pseudo&amp;prenom&amp;nbEvalsCompletes=$nbEvalsCompletes"> <!-- redirection vers recherchePremium-->
            <br>
          </fieldset>
        </form>
      </ul>
    </div>
  </nav>
  <?php try
{
    $bdd = new PDO('mysql:host=heroku.com;dbname=jeuxindes;charset=utf8', 'j.boiteux@outlook.fr', 'login1302');
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$reponseMembre = $bdd->query('SELECT * FROM membre_premium');
// On affiche chaque entrée une à une
while ($membre = $reponseMembre->fetch())
{
  if ($membre['pseudo'] == NULL OR $membre['motDePasse'] == NULL) // On vérifie s'il n'y a pas de champ vide
  {
    echo 'Tous les champs ne sont pas remplis !';
  }
  else // Si c'est bon, on enregistre les informations dans la base
  {
    $bdd->prepare('INSERT INTO membre_premium VALUES ("pseudo", "mdp")');
    $bdd->execute(array($membre['pseudo'], $membre['motDePasse']));
    /* Puis on envoie les informations
    for ($numero = 1 ; $numero <= 3 ; $numero++)
    {
      if ($_FILES['photo' . $numero]['error'] == 0)
      {
            if ($_FILES['photo' . $numero]['size'] < 500000)
            {
                move_uploaded_file($_FILES['photo' . $numero]['tmp_name'], $numero . '.jpg');
            }
            else
            {
                echo 'La photo ' . $numero . 'n\'est pas valide.<br />';*/
                $probleme = true;
            //}
        //}
    }
    // Enfin, affichage d'un message de confirmation si tout s'est bien passé
    if (!(isset($probleme)))
    {
        echo 'Merci ! Les informations ont été correctement enregistrées !';
    }
  } ?>
    <?php function compterNbEvalsCompletes($evalsCompletes){};
    $nbEvalsCompletes = compterNbEvalsCompletes($membre['pseudo']);
    // Envoyer nbEvalsCompltes a reductions
    $reponseMembre->closeCursor(); // Termine le traitement des requêtes
    // Hachage du mot de passe
    $pass = 'mdp';
    $hash = password_hash($pass,PASSWORD_BCRYPT,['cost' => 13]);

    // Vérification des identifiants
    $req = $bdd->prepare('SELECT pseudo FROM membres WHERE pseudo = :pseudo AND mdp = :mdp');
    $req->execute(array(
        'pseudo' => $pseudo,
        'hash' => $hash));

    $resultat = $req->fetch();
    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        echo 'Vous êtes connecté !';
    }
    if (isset($_COOKIE['pseudo']) AND isset($_COOKIE['hash']))
    {
        echo 'Bonjour ' . $_COOKIE['pseudo'];
    } ?>

   	<?php include("pied_de_page.php"); ?>
  </body>
</html>
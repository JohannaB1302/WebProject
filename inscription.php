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
                    <input type="text" name="prenom">
                    <br>
                    Pseudo :<br>
                    <input type="text" name="pseudo">            
                    <br>
                    Mail :<br>
                    <input type="text" name="mail">
                    <br>
                    Mot de passe :<br>
                    <input type="password" name="mdp">
                    <br>
                    <!-- Envoyer nbEvalsCompltes=0 a reductions -->
                    <input type="hidden" name="nbEvalsCompletes" value="0"/>
                    <input type="submit" value="S'inscrire" onclick="window.location.href='recherchePremium.php?pseudo&amp;prenom&amp;mail&amp;mdp'">
                    <br>
                </fieldset>
            </form>
        </ul>
    </div>
</nav>
<?php try
{
    $bdd = new PDO('mysql:host=sql.herokuapp.com/;dbname=jeuxindes;charset=utf8', 'j.boiteux@outlook.fr', 'login1302');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
// Hachage du mot de passe
$pass = 'mdp';
$hash = password_hash($pass,PASSWORD_BCRYPT,['cost' => 13]);
// Comparaison du mot de passe et du hash
if(password_verify($pass, $hash))
{
    echo 'OK';
} else {
    echo 'ERREUR';
}
// Envoi des infos du membre dans la BDD
$req = $bdd->prepare('INSERT INTO membre_premium(pseudo, prenom, adresseMail, motDePasse) VALUES(:pseudo, :prenom, :mail, :mdp)');
$req->execute(array(
    'pseudo' => $pseudo,
    'prenom' => $prenom,
    'email' => $mail,
    'hash' => $hash));
    // Verification de l'existence d'un pseudo similaire dans la BDD
    $resultat = $req->fetch();
    if (!$resultat)
    {
        echo 'Ce pseudo est déjà pris !';
    }
    else
    {
        // Verification de la forme du mail
        if (isset($_POST['mail']))
        {
            $_POST['mail'] = htmlspecialchars($_POST['mail']); // On rend inoffensives les balises HTML que le visiteur a pu rentrer
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail'])) // Expression régulière a chercher dabns le champ 'Mail'
            {
                echo 'L\'adresse ' . $_POST['mail'] . ' est <strong>valide</strong> !';
            }
            else
            {
                echo 'L\'adresse ' . $_POST['mail'] . ' n\'est pas valide, recommencez !';
            }
        }
    } ?>
    <?php include("pied_de_page.php"); ?>
  </body>
</html
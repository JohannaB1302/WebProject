<!DOCTYPE html>
<html lang="fr">
  <?php include("en_tete.php"); ?>
  <h1>Vos activites recentes</h1>
  <?php // Connexion à la base de données
try
{
   $bdd = new PDO('mysql:host=localhost;dbname=jeuxindés;charset=utf8', 'root', '');
}
catch(Exception $e)
{
       die('Erreur : '.$e->getMessage());
}
// On récupère les 5 derniers billets
$req = $bdd->query('SELECT numRecherche, idJeu, DATE_FORMAT(numRecherche, \'%d/%m/%Y à %Hh%imin%ss\') AS numR FROM recherche ORDER BY numR DESC LIMIT 0, 5');
while ($donnees = $req->fetch())
{
?>
<div class="recents">
    <h3>
        <?php echo htmlspecialchars($donnees['numRecherche']); ?>
        <em>le <?php echo $donnees['numR']; ?></em>
    </h3>
    <p>
    <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['idJeu']));
    ?>
    <br />
    <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
    </p>
</div>
<?php
} // Fin de la boucle des billets
$req->closeCursor();
?>
  <?php include("pied_de_page.php"); ?>
  </body>
</html>
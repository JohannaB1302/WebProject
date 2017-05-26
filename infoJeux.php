<!DOCTYPE html>
<html lang="fr">
<!--<?php //include("en_tete.php"); ?>
<?php //include("connexion.php"); ?>-->

  <body>
    <h1>Informations sur les jeux</h1>
    <table style="width:100%">
    <tr>
    <?php try
{
    $bdd = new PDO('mysql:host=inde-couvertes.herokuapp.com;dbname=jeuxindés;charset=utf8', 'j.boiteux@outlook.fr', 'login1302');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$reponseMembre = $bdd->query('SELECT * FROM membre_premium');
$reponseEval = $bdd->query('SELECT * FROM evaluation');
/*echo $_POST['parTitre'];
echo $_POST['parAnnee'];*/
if ($_POST['parTitre'] = 'on')
{
    $reponseJeu = $bdd->query('SELECT idJeu, titre FROM jeu ORDER BY titre ASC');
    // On affiche chaque entrée une à une
    while ($jeu = $reponseJeu->fetch())
    { ?>
    <p>
    <?php echo  'Jeu numéro ', $jeu['idJeu'], ' intitulé ', $jeu['titre'], '<br />'; ?>
    </p>
    <?php
    }
}
else
{
// On affiche chaque entrée une à une
while ($jeu = $reponseJeu->fetch() AND $membre = $reponseMembre->fetch() AND $eval = $reponseEval->fetch())
{ ?>
    <p>
    <strong>Jeu</strong> : <?php echo $jeu['titre']; ?> (sorti en <?php echo $jeu['anneeSortie']; ?>)<br />
    <?php // Une fonction préexistante qui permet de créer des images miniatures (aussi appelées thumbnails).
    //En cas d'erreur de l'image, supprimer cette ligne <?php header ("Content-type: image/png");
    $monfichier = fopen('compteurConsultations.txt', 'r+');
      $consultations = fgets($monfichier);
      $consultations += 1;
      fseek($monfichier, 0); // On remet le curseur au début du fichier
      echo '<p>Ce jeu a été consulté ' . $consultations . ' fois !</p>';
      fclose($monfichier);
    echo $jeu['description'], '<br />'; ?>
    Ce jeu est un <?php echo $jeu['genre']; ?> qui fonctionne sur <?php echo $jeu['plateForme']; ?><br />
    Identifié par le chiffre <?php echo $jeu['idJeu']; ?>, il coûte <?php echo $jeu['prix']; ?> euros<br />    
    <?php // Afficher les évaluations par pseudo
    echo $membre['pseudo']; ?> a laissé ce commentaire sur <?php echo $jeu['titre']; ?> : <em><?php echo $eval['commentaire']; ?></em>
    </p>
<?php
}
}
$idJeu = $jeu['idJeu'];
// Modifiaction d'un jeu
    function modifierJeu($idJeu){};
    $jeuModifie = modifierJeu($idJeu); // Une fonction préexistante qui permet de rechercher et de remplacer des mots dans une variable.
    // Suppression d'un jeu
    function supprimerJeu($idJeu){};

$reponseJeu->closeCursor();
$reponseMembre->closeCursor();
$reponseEval->closeCursor(); // Termine le traitement des requêtes ?>
    </tr>
    </table>
    <?php function calculNoteMoyenne($notes){};
        
    ?>
  </body>
</html>
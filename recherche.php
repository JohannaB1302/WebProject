<!--Contient les fonctionnalités de recherche standard-->
<!DOCTYPE html>
<html lang="fr">
<!--<?php //include("en_tete.php"); ?>
<?php //include("connexion.php"); ?>-->

<body>
    <h1 align="center">Bienvenue sur <strong>Indé-Couvertes</strong> !</h1>
    <h2 align="center">Recherchez les jeux qui vous correspondent</h2>
    <?php $resultats = array ('Jeu1', 'Jeu2', 'Jeu3', 'Jeu4', 'Jeu5', 'Jeu6', 'Jeu7', 'Jeu8', 'Jeu9', 'Jeu10'); // On crée notre array $resultats ?>
    <nav id="selection_critère">
        <div class="option_critère">
            <h3 align="center">Vous pouvez sélectionner au moins un critère de recherche</h3>
            <ul>
                <form method="post" action="resultat.php">
                    <input type="checkbox" name="parTitre" id="1"/> <label for="1">Par titre</label>                
                    <input type="checkbox" name="parPrix" id="2"/> <label for="2">Par prix</label>
                    <input type="checkbox" name="parAnnee" id="3"/> <label for="3">Par année</label>                
                    <input type="checkbox" name="parGenre" id="4"/> <label for="4">Par genre</label>
                    <input type="checkbox" name="parPlateForme" id="5"/> <label for="5">Par plate-forme</label>
                    <input type="checkbox" name="parEditeur" id="6"/> <label for="6">Par éditeur</label>
                    <input type="checkbox" name="parMotCle" id="7"/> <label for="7">Par mot-clé</label>
                    <input type="checkbox" name="parNote" id="8"/> <label for="8">Par note</label>
                    <?php function selectParTPrix($resultats){}; ?>
                    
                    <?php function selectParAnnee($resultats){};
                    function selectParGenre($resultats){};
                    function selectParPlateForme($resultats){};
                    function selectParEditeur($resultats){};
                    function selectParMotCle($resultats){};
                    function selectParNote($resultats){}; ?>
                </form>
            </ul>
        </div>
    </nav>
    
     <?php try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=jeuxindés;charset=utf8', 'root', ''); // A modifier lors du déploiement
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    $reponseRecherche = $bdd->query('SELECT * FROM recherche');
    include("infoJeux.php");
    while ($recherche = $reponseRecherche->fetch())
        {     
        if (isset($recherche['numRecherche']))
        {
            // Le nombre doit être compris entre 1 et 10
            if ($recherche['aTrouve'] == 1)
                {
                    echo 'Recherche ', $recherche['numRecherche'], ' terminée en ', $recherche['duree'], 's<br />';
                }
        }
        else
        {
            echo 'Aucun résultat trouvé' . '<br />';
        }
    }
    $reponseRecherche->closeCursor(); // Termine le traitement des requêtes
    
             ?>
  </body>

  <?php include("pied_de_page.php"); ?>
</html>


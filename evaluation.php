<!DOCTYPE html>
<html lang="fr">
  <?php include("en_tete.php"); ?>
  <body>
  
  <nav id="evaluation">
    <div class="champs_eval">
     <h1>Evaluer des jeux</h1>      
      <ul>
        <form method="post" action="infoJeux.php">
          <fieldset>
            <legend>Seul le champ Note est obligatoire</legend>
            Note :<br>
            <input type="number" name="noteEval">
            <br>
            Commentaire :<br>
            <textarea name="commentaire" rows="10" cols="45" value="NULL">
			Saisissez votre commentaire ici
			</textarea>
			<br>
            <input type="submit" value="Publier votre évaluation" onclick="window.location.href='infoJeux.php?noteEval=20&amp;commentaire=Parfait">
            <!-- Verifier que noteEval entier entre 0 et 20, le commentaire -->
            <br>
          </fieldset>
        </form>
      </ul>
    </div>
  </nav>
  <?php if (isset($_GET['noteEval']))
  {
    // On force la conversion en nombre entier
    $_GET['noteEval'] = (int) $_GET['noteEval'];
    // La note doit être comprise entre 0 et 20
    if ($_GET['noteEval'] >= 0 AND $_GET['noteEval'] <= 20)
    {
    	//Aller à infoJeux
    }
  }
  else
  {
  	echo 'Tous les champs ne sont pas remplis !';
  } ?>

  <?php include("pied_de_page.php"); ?>
  </body>
</html>
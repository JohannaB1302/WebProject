<!DOCTYPE html>
<html lang="fr">
	<?php include("en_tete.php"); ?>
<body>
  <h1>Vos réductions</h1>
  <!-- Recevoir nbEvalsCompletes depuis inscription ou identificationPremium -->
  <?php 
  $monfichier = fopen('compteurEvalsCompletes.txt', 'r+');
      $_COOKIE['nbEvalsCompletes'] = fgets($monfichier);
      $_COOKIE['nbEvalsCompletes'] += 1; // augmenter sous conditions
      fseek($monfichier, 0); // On remet le curseur au début du fichier
      fputs($monfichier, $_COOKIE['nbEvalsCompletes']); // On écrit le nouveau nombre d'evalsCompletes
      fclose($monfichier);
      echo 'Vous avez publié ', $_COOKIE['nbEvalsCompletes'], ' évaluations complètes'; ?>
  <?php include("pied_de_page.php"); ?>
  </body>
</html>
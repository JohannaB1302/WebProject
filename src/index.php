<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Indé-Couvertes : Index</title>

    <!-- Inclusion du Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <?php
  if ($pseudo = 17)
  {
    echo 'Bienvenue sur <strong>Indé-Couvertes</strong>, ', $pseudo, ' !'; ?>
    <a href="accueilPremium.php?prenom=Johanna&amp;nom=BOITEUX">Redirection vers accueil des membres Premium </a>
  }
  <?php
  else
  {
    echo 'Bienvenue sur <strong>Indé-Couvertes</strong> !'; ?>
    <a href="accueilNormal.php">Redirection vers accueil des visiteurs non inscrits</a>
  }
  ?>
  </body>
</html>

<body>
    <p>Bonjour <?php echo $_GET['prenom']. ' ' .$_GET['nom'];?> !</p>
    <?php
      $profil = array('prenom' => , 'nom' => , 'pseudo' => , 'mail' => );
      $pseudo = NULL;
      if ($pseudo = 17)
      {
        echo 'Bienvenue sur <strong>Indé-Couvertes</strong>, ', $pseudo, ' !';
      }
      else
      {
        echo 'Bienvenue sur <strong>Indé-Couvertes</strong> !\n <a>Voulez-vous vous inscrire ?</a>';
      }
    ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


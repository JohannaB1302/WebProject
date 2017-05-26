<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Indé-Couvertes</title>
  <p align="center">
  <?php 
    $jour = date('d');
    $mois = date('m');
    $annee = date('Y');
    $heure = date('H');
    $minute = date('i');
    echo 'Vous êtes actuellement connecté le ' . $jour . '/' . $mois . '/' . $annee . ' à ' . $heure. ' h ' . $minute; ?><br>
    Le codage de ce site respecte les standards <a href="http://www.php-fig.org/psr/psr-1/">PSR-1</a> et <a href="http://www.php-fig.org/psr/psr-2/">PSR-2</a>.<br>
    </p>
  <!-- Inclusion du Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    table, th, td { border: 1px solid black; }
  </style>
</head>

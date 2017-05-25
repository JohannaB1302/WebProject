<?php if(isset($_POST['parTitre']))
    {
        echo 'salut';
        //echo '<input type="submit" value="Par titre" onclick="window.location.href="infoJeux.php"">';
        function selectParTitre($resultats){};
    }
    foreach ($resultats as $champ => $info)
    {
        // afficher les 10 jeux les mieux notés renvoyés par la recherche
        echo  'Jeu numéro ', $champ, ' intitulé ' . $info . '<br />';
    } ?>
<?php
$mysqli = new Mysqli ('localhost', 'root', '', 'securite');

if($_POST)
{
    $req = "SELECT * FROM membre WHERE pseudo='$_POST[pseudo]' AND mdp='$_POST[mdp]'";
    $résultat = $mysqli->query($req);
    echo 'requete debug : ' . $req . '';
    $membre = $résultat->fetch_assoc();
    if(!empty($membre))
    {
        echo '<div class="validation"><h1>Vous êtes bien reconnu par le site web pour vous connecter...</h1></div>';
        echo "votre id est : " . $membre['id_membre'] . "<br>";
        echo "votre pseudo est : " . $membre['pseudo'] . "<br>";
        echo "votre mdp est : " . $membre['mdp'] . "<br>";
        echo "votre nom est : " . $membre['nom'] . "<br>";
        echo "votre prenom est : " . $membre['mdp'] . "<br>";
        echo "votre email est : " . $membre['email'] . "<br>";
    }
    else
    {
        echo '<div class="erreur"><h1>Erreur d\'identification</h1></div>';
    }
}

?>

<hr>
 
<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br>
     
    <label for="mdp">mdp</label><br>
    <input type="text" id="mdp" name="mdp"><br>
     
    <input type="submit" value="Se connecter">
</form> 
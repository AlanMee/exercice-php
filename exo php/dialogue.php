<?php
$mysqli = new Mysqli ('localhost', 'root', '', 'dialogue');
$contenu ="";

if($_POST)
{
    $_POST['pseudo'] = addslashes ($_POST['pseudo']);
    $_POST['message'] = addslashes ($_POST['message']);
    if(!empty($_POST['pseudo']) && !empty($_POST['message']))
    {
       $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())") OR DIE ($mysqli->error);
       echo '<div class="validation"> Votre message a bien été enregistré.</div>'; 
    }
    
}
else 
{
    echo '<div class="erreur"> Afin de déposer un commentaire, veuillez svp remplir tous les champs du formulaire. </div>';
}

$resultat = $mysqli->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire order by date_enregistrement DESC");

echo '<h2>' . $resultat->num_rows . ' commentaire(s)</h2>';

while ($commentaire = $resultat->fetch_assoc())
{
    echo '<div class="message">';
        echo '<div class ="titre"> Par: ' . $commentaire['pseudo'] . ', le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</div>';
        echo '<div class="contenu">Message: ' . $commentaire['message'] . '</div>'. '<br>';
    echo '</div>';
}

?>

<!Doctype html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
<div class="commentaire"><?php echo $contenu; ?></div>
<form method="post" action="">
    <label for="pseudo"> Pseudo </label>
    <input type ="text" name="pseudo" id="pseudo" maxlenght ="20" pattern ="[a-zA-Z0-9.-_]+" title="caractère autorisés : a-zA-Z0-9.-_" placeholder="Pseudo"><br>

    <label for="message"> Message </label> <br>
    <textarea id="message" name ="message" cols="50" rows= "7" placeholder="Votre message"> </textarea> <br>
    
    <input type="submit" value="Envoyer le message">

</form>
</body>
</html>
<?php
$mysqli = new Mysqli ("localhost", "root", "", "employes");

$result = $mysqli->query("INSERT INTO employes (prenom, nom, sexe, services, date_embauche, salaire) VALUES ('prenom', 'nom', 'm', 'informatique', '2015-07-30', 5000)");
echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête INSERT<br>';

$result = $mysqli->query("UPDATE employes SET salaire = 2500 WHERE id_employes = 802");
echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête UPDATE <br>';

$result = $mysqli->query("DELETE FROM employes WHERE id_employes = 388");
echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête DELETE <br>';

$result = $mysqli->query("SELECT * FROM employes WHERE prenom='julien'");
$employe = $result->fetch_assoc();
echo "<pre>"; print_r($employe); echo "</pre>";
echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[services]<br>";

$result = $mysqli->query("SELECT * FROM employes");
while($employe = $result->fetch_assoc())
{
    echo "<pre>"; print_r($employe); echo "</pre>";
    echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[services]";
}
echo $result->num_rows . ' enregistrement(s) récupéré(s) par la requête SELECT <br>';
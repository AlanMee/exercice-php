<?php

$pdo = new PDO('mysql:host=localhost;dbname=employes', 'root', '', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

$result = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, services, date_embauche, salaire) VALUES ('prenom', 'nom', 'm', 'informatique', '2015-07-30', 5000),");
echo $result . ' enregistrement(s) affecté(s) par la requête INSERT<br>';
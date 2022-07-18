<?php
session_start();
echo "Temps actuel: " . time() . "<br>";
print "<pre>"; print_r($_SESSION); print "<pre>";

if (isset ($_SESSION["temps"]))
{
    if (time()>($_SESSION["limite"]))
    {
        session_destroy();
        echo "Déconnexion";
    }
    else
    {
        $_SESSION["temps"] = time ();
        echo "Connexion mise à jour";
    }
}
else
{
    echo "connexion";
    $_SESSION["limite"] = 20;
    $_SESSION["temps"] = time();
}
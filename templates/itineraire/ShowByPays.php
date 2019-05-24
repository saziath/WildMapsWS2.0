<?php
if(isset($_GET['pays']))
{
    $pays=$_GET['pays'];
    $bdd = new PDO('mysql:host=localhost;dbname=itineraire;charset=utf8', 'root', '',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $query = "SELECT * FROM itineraire WHERE pays = '$pays'";

echo $pays;
}

?>
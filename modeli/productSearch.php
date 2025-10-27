<?php

if( !isset($_GET['ime']) || empty($_GET['ime']) )
{
    die("Niste proslijedili ime proizvoda!");
}

require_once "baza.php";

$ime = $_GET['ime'];

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime LIKE '%$ime%' OR opis LIKE '%$ime%'");

if($rezultat->num_rows >= 1)
{
    echo "Uspjesno smo pronasli ".$rezultat->num_rows." proizvoda";
}
else
{
    echo "Nismo pronasli nijedan proizvod";
}

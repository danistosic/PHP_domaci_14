<?php

if( !isset($_POST['email']) || empty($_POST['email']) )
{
    die("Niste proslijedili email!");
}

if( !isset($_POST['sifra']) || empty($_POST['sifra']) )
{
    die("Niste proslijedili sifru!");
}

$email = $_POST['email'];
$sifra = $_POST['sifra'];

    require_once "baza.php";

    $baza->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");


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
$sifra = password_hash($_POST['sifra'], PASSWORD_BCRYPT);


    require_once "baza.php";

    /* 
    *VJEZBA
    *1. Uraditi query da pronadjemo korisnika sa odredjenim $email
    *2. Provjeriti da li smo dobili nazad neke rezultate (num_rows)
    */

    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");

    // Ako nam vrati $rezultat->num_rows 1 ili vise - onda korisnik postoji
    // Ako je $rezultat->num_rows 0 onda nema nikoga sa tim email-om

    if($rezultat->num_rows >= 1) // Korisnik sa email-om postoji
    {
        die("Vec postoji korisnik sa ovom email adresom!");
    }
    else // Ako je rezultat 0
    {
        echo "Uspjesno ste se registrirali";
        $baza->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");
    }
    


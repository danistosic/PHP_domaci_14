<?php

require_once "baza.php";

$rezultat = $baza->query("SELECT * FROM korisnici");

// num_rows -> koliko je redova u bazi query nasao

if ($rezultat->num_rows > 0)
{
    echo "Ukupno smo nasli korisnika: ".$rezultat->num_rows;

    //fetch_all -> vrati mi sve korisnike
    //MYSQLI_ASSOC -> vrati mi kao assoc array ['email' => "Toma@gmai.com]
    $korisnici = $rezultat->fetch_all(MYSQLI_ASSOC);

    foreach($korisnici as $korisnik)
    {
        echo $korisnik['email'];    
    }
    
}
else {
    echo "Nismo nasli nijednog korisnika";
}
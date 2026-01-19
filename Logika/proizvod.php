<?php

    if(!isset($_GET['ime']) or empty($_GET['ime'])){
        die ("Niste unijeli ime proizvoda");
    }
    if(!isset($_GET['opis']) or empty($_GET['opis'])){
        die ("Niste unijeli opis proizvoda");
    }
    if(!isset($_GET['cijena']) or empty($_GET['cijena'])){
        die ("Niste unijeli cijenu proizvoda");
    }
    if(!isset($_GET['slika']) or empty($_GET['slika'])){
        die ("Niste unijeli sliku proizvoda");
    }
    if(!isset($_GET['kolicina']) or empty($_GET['kolicina'])){
        die ("Niste unijeli kolicinu proizvoda");
    }

    require_once "baza.php";

    $ime = $_GET['ime'];
    $opis = $_GET['opis'];
    $cijena = $_GET['cijena'];
    $slika = $_GET['slika'];
    $kolicina = $_GET['kolicina'];

    $rezultat = $baza->query("INSERT INTO proizvodi (ime,opis,cijena,slika,kolicina) VALUES ('$ime', '$opis', '$cijena', '$slika', '$kolicina') ");

    if($rezultat){
        echo "Dodali ste proizvod!";
    }
    else{
        echo "Greska!";
    }

?>
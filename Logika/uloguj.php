<?php

    if(!isset($_POST['email']) or empty($_POST['email'])){
        die ("Niste unijeli email!");
    }
    if(!isset($_POST['sifra']) or empty($_POST['sifra'])){
        die ("Niste unijeli sifru!");
    }

    require_once "baza.php";

    $email = $_POST['email'];
    $sifra = $_POST['sifra'];
    
    

    $rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email' ");

    if($rezultat->num_rows == 1){
        $korisnik = $rezultat->fetch_assoc();
        $verifikacija = password_verify($sifra, $korisnik['sifra']);
        if($verifikacija){
            if(session_status() == PHP_SESSION_NONE){
            session_start();
        }
            $_SESSION['ulogovan'] = true;
            header("Location: ../index.php");
        }
        else{
            die ("Unijeli ste pogresnu lozinku");
        }
    }
    else{
        die ("Taj korisnik ne postoji!");
    }

?>
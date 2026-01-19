<?php

    if(!isset($_GET['trazilica']) or empty($_GET['trazilica'])){
        
    }

    require_once "baza.php";

    $pretraga = $_GET["trazilica"];

    $rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime LIKE '%$pretraga%' ");

    if($rezultat->num_rows >= 1){
        echo "Nasli smo slicne pretrage";
    }
    else{
        echo "Nema slicnih rezultata";
    }

?>
<?php

    if(!isset($_GET['id']) or empty($_GET['id'])){
        die ("Fali ID proizvoda!");
    }

    require_once "Logika/baza.php";

    $idProizvoda = $_GET['id'];

    $rezultat = $baza->query("SELECT * FROM proizvodi WHERE id = $idProizvoda ");
    
    if($rezultat->num_rows == 0){
        die ("Taj ID ne postoji!");
    }

    $proizvod = $rezultat->fetch_assoc();

    //array(6) { 
       // ["id"]=> string(1) "1" 
       // ["ime"]=> string(9) "iPhone 13" 
       // ["opis"]=> string(12) "Dobar iphone" 
       // ["cijena"]=> string(7) "1199.99" 
       // ["slika"]=> string(12) "iPhone13.jpg" 
       // ["kolicina"]=> string(2) "55" 
    //}

?>

<!DOCTYPE html>

<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> <?= $proizvod['ime'] ?></title>
    </head>

    <body>
        
        <div>

            <h1> <?= $proizvod['ime'] ?> </h1>
            <p> <?= $proizvod['opis'] ?> </p>
            <p> Cijena proizvoda: <?= $proizvod['cijena'] ?> </p>
            
            <?php if($proizvod['kolicina']  < 1): ?>

                <p> Nema na stanju. </p>
                
                <?php else: ?>

                <p> Na stanju: <?= $proizvod['kolicina'] ?> </p>

            <?php endif; ?>

        </div>

    </body>

</html>
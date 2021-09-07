<?php
    require "product.php";
    require "user.php";

    $miaCarta = new Card("Davide", 123456, "2027", 789, 254.72);
    $firstUser = new User("Riccioli", "Italy", ["Milano, Via Ippocrate 45"]);  
    $altUser = new PremiumUser("NotRiccioli", "Italy", ["Domodossola, Via Scapaccino 32"]);
    
    $firstUser->addCreditCard($miaCarta);
    $altUser->addCreditCard($miaCarta);

    $fridge = new Product("Smart Fridge", "LG", 189.99, 49.99, "fridge");
    $tv = new Product("Smart TV", "Samsung", 249.99, 39.99, "tv");
    $ps5 = new Product("PlayStation 5", "Sony", 499.99, 29.99, "game console");
    $pen = new Product("Cool-looking Pen", "Pen Inc.", 9.99, 0.99, "pen");

    $firstUser->addProduct($fridge, 1);
    $firstUser->addProduct($pen, 20);
    $altUser->addProduct($tv, 1);
    $altUser->addProduct($ps5, 1);
    
    var_dump($firstUser);
    var_dump($altUser);
    $altUser->addProduct($pen, 1);
    var_dump($altUser);
?>
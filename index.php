<?php
declare(strict_types=1);
//Init session
SESSION_START();
require "classes/autoload.php";

$blackjack;

// whatIsHappening();

if (empty($_POST)){
    if (isset($_SESSION['blackjack'])){
     $blackjack = unserialize($_SESSION['blackjack']);  
    } else{
     $blackjack=new Blackjack();
     $blackjack->getPlayer()->hit($blackjack->getDeck());
     $blackjack->getDealer()->hit($blackjack->getDeck());
     $_SESSION['blackjack'] = serialize($blackjack);           
    }
 
 }

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["hit"])){
        //Calling the  hit function
    }
    
    if (isset($_POST["stand"])){
        //Calling the  stand function
    }
    
    if (isset($_POST["surrender"])){
        //Calling the  surrender
    }
    
    //Saving the game
    if (isset($blackjack)) {
        $_SESSION['blackjack'] = serialize($blackjack);
    }


}

function whatIsHappening() {
    echo '<h2>$_GET</h2>';
    var_dump($_GET);
    echo '<h2>$_POST</h2>';
    var_dump($_POST);
    echo '<h2>$_COOKIE</h2>';
    var_dump($_COOKIE);
    echo '<h2>$_SESSION</h2>';
    var_dump($_SESSION);
}


// print_r($blackjack->getDealer()->getCards());
// var_dump($blackjack->getPlayer()->getScore());
// var_dump($blackjack->getDealer()->hasLost());

// echo "<p style='font-size:200px;'>"; 
// foreach($blackjack->getDealer()->getCards() AS $card) {
//     echo $card->getUnicodeCharacter(true);    
// }
// echo "</p>";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
        integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous" />
    <!-- Bootsterap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <title> Blackjack</title>
</head>

<body>
    <div class="container mt-1">
        <div class="alert alert-dismissible alert-primary">
            <h2 class="text-center">Blackjack!</h2>
        </div>
        <form method="post" action="">
            <div class=" form-row">
                <div class="form-group col-md-12">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 text-center">
                    <button type="submit" class="btn btn-warning btn-lg btn-block btn " name="hit">
                        <img class="img-responsive" src="./img/card-game-hand_p.png">
                        <span>Hit!</span>
                    </button>
                </div>
                <div class="form-group col-md-4 text-center">
                    <button type="submit" class="btn btn-warning btn-lg btn-block btn" name="stand"><img
                            class="img-responsive" src="./img/like-up_p.png">
                        <span>Stand!</span></button>
                </div>
                <div class="form-group col-md-4 text-center">
                    <button type="submit" class="btn btn-warning btn-lg btn-block btn" name="surrender"></i> <img
                            class="img-responsive" src="./img/like-down_p.png">
                        <span>Surrender!</span></button>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="jumbotron" id="machine" class="img-fluid">
                        <!-- <img src="img/robot.jpg" alt=""> -->
                        <p style="font-size:200px;" class="text-center">
                            <? foreach($blackjack->getDealer()->getCards() AS $card) {
                           echo $card->getUnicodeCharacter(true);    
                         }?>
                        </p>
                        <p style="font-size=100px;">Score:
                            <?echo $blackjack->getDealer()->getScore(); ?>
                        </p>
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <div class="jumbotron" id="player">
                        <!-- <img src="img/person.jpg" alt="" class="img-fluid"> -->
                        <p style="font-size:200px;" class="text-center">
                            <? foreach($blackjack->getPlayer()->getCards() AS $card) {
                           echo $card->getUnicodeCharacter(true);    
                         }?>
                        </p>
                        <p style="font-size=100px;">Score:
                            <?echo $blackjack->getPlayer()->getScore(); ?>
                        </p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
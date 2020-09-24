<?php
declare(strict_types=1);
//Init session
SESSION_START();
// SESSION_UNSET();
require "classes/autoload.php";

$blackjack;
// whatIsHappening();
// if (empty($_POST)){
    if (isset($_SESSION['blackjack'])){
     $blackjack = unserialize($_SESSION['blackjack']);  
    } else{
     $blackjack=new Blackjack();    
     $_SESSION['blackjack'] = serialize($blackjack);           
    }
 
//  }

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["hit"])){
        //Calling the  hit function
        $blackjack->getPlayer()->hit($blackjack->getDeck());
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

require 'game.php';
?>
<?php
declare(strict_types=1);
//Init session
SESSION_START();
SESSION_UNSET();
require "classes/autoload.php";

$blackjack;
$winner="";
// whatIsHappening();
// if (empty($_POST)){
    if (isset($_SESSION['blackjack'])){
       $blackjack = unserialize($_SESSION['blackjack']);  

    } else{
       $blackjack=new Blackjack();
       if ($blackjack->getDealer()->getScore()==21 || $blackjack->getPlayer()->getScore()==21){
         $winner=$blackjack->getWinner();     
       }       
       $_SESSION['blackjack'] = serialize($blackjack);           
    }
 
//  }

if ($_SERVER["REQUEST_METHOD"]=="POST"){
    if (isset($_POST["hit"])){
        //Calling the  hit function
        $blackjack->getPlayer()->hit($blackjack->getDeck());
        if ($blackjack->getPlayer()->hasLost()){
            $blackjack->getWinner();
        }
    }
    
    if (isset($_POST["stand"])){
        //Calling the  stand function
        $blackjack->getDealer()->hit($blackjack->getDeck());
        $blackjack->getWinner();
       
    }
    
    if (isset($_POST["surrender"])){
        //Calling the  surrender        
        $blackjack->getPlayer()->surrender();
        $blackjack->getWinner();
    }
    if (isset($_POST["newGame"])){
        //Calling the  NewGame
        SESSION_UNSET();
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
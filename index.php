<?php
declare(strict_types=1);

//Init session
SESSION_START();
require "classes/autoload.php";

$blackjack;
$userMessage="";

if (isset($_SESSION['blackjack']) && !isset($_POST["newGame"])){
    $blackjack = unserialize($_SESSION['blackjack']);  
    $userMessage=$blackjack->getUserMessage();

} else{
       $blackjack=new Blackjack();
       $userMessage=$blackjack->getUserMessage();

       if ($blackjack->getDealer()->getScore()==21 || $blackjack->getPlayer()->getScore()==21){
        $userMessage=$blackjack->getWinner();
        SESSION_UNSET();     

       } else{       

           $_SESSION['blackjack'] = serialize($blackjack);           
       }
    }

//Checking if someone Loose    
if ($_SERVER["REQUEST_METHOD"]=="POST" ){
    if (isset($_POST["hit"])){
        //Calling the  hit function : 
        $blackjack->getPlayer()->hit($blackjack->getDeck());

        if ($blackjack->getPlayer()->hasLost()){
            
            $userMessage=$blackjack->getWinner();
            SESSION_UNSET();
            
            

        }else{

            $_SESSION['blackjack'] = serialize($blackjack);
        }
    }
    
    if (isset($_POST["stand"])){
        //Calling the  stand function
        $blackjack->getDealer()->hit($blackjack->getDeck());
        $userMessage=$blackjack->getWinner();
        SESSION_UNSET();
        
    }
    
    if (isset($_POST["surrender"])){
        //Calling the  surrender        
        $blackjack->getPlayer()->surrender();
        $userMessage=$blackjack->getWinner();
        SESSION_UNSET();
        
    }    
}
//Drawing the html of the game
require 'game.php';
?>
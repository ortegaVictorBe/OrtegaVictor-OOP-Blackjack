<?php
declare(strict_types=1);
//Init session
SESSION_START();
require "classes/autoload.php";

$blackjack;
$winner="";

if (isset($_SESSION['blackjack']) && !isset($_POST["newGame"])){
    $blackjack = unserialize($_SESSION['blackjack']);  

} else{
       $blackjack=new Blackjack();

       if ($blackjack->getDealer()->getScore()==21 || $blackjack->getPlayer()->getScore()==21){

          $winner=$blackjack->getWinner();
          SESSION_UNSET();     

       } else{       

           $_SESSION['blackjack'] = serialize($blackjack);           
       }
    }

//checking if someone Loose    
if ($_SERVER["REQUEST_METHOD"]=="POST" ){
    if (isset($_POST["hit"])){
        //Calling the  hit function : 
        $blackjack->getPlayer()->hit($blackjack->getDeck());

        if ($blackjack->getPlayer()->hasLost()){

            $winner=$blackjack->getWinner();
            SESSION_UNSET();
            
            

        }else{

            $_SESSION['blackjack'] = serialize($blackjack);
        }
    }
    
    if (isset($_POST["stand"])){
        //Calling the  stand function
        $blackjack->getDealer()->hit($blackjack->getDeck());
        $winner=$blackjack->getWinner();
        SESSION_UNSET();
        
    }
    
    if (isset($_POST["surrender"])){
        //Calling the  surrender        
        $blackjack->getPlayer()->surrender();
        $winner=$blackjack->getWinner();
        SESSION_UNSET();
        
    }    
}
//Drawin the html of the game
require 'game.php';
?>
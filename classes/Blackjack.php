<?php

// require "Player.php";

class Blackjack
{
 private $player;
 private $dealer;
 private $deck;


 public function __construct(){
  $this->deck= new Deck();
  $this->deck->shuffle();
  
  $this->dealer=new Dealer($this->deck);    
  $this->player=new Player($this->deck);    
 
 }

 /*** Get the value of player*/ 
 public function getPlayer()
 {
  return $this->player;
 }

 /*** Get the value of dealer */ 
 public function getDealer()
 {
  return $this->dealer;
 }

 /*** Get the value of deck */ 
 public function getDeck()
 {
  return $this->deck;
 }

 public function getWinner(){
     $winner="";

     if ($this->dealer->hasLost()){
         $winner="PLAYER WINS";    

     }elseif ($this->player->hasLost()) {
         $winner="COURPIER WINS";         

     }elseif (!$this->dealer->hasLost() && !$this->player->hasLost()) {

            if ($this->dealer->getScore() == 21){
                $winner="COURPIER WINS - BLACKJACK!";            

            }elseif ($this->player->getScore() == 21) {
                $winner="COURPIER WINS - BLACKJACK!";
                
            } else{

                  if($this->dealer->getScore() == $this->player->getScore()){
                      $winner="TIE !";

                  }elseif ($this->dealer->getScore() > $this->player->getScore()) {
                      $winner="COURPIER WINS";

                  }else{
                    $winner="PLAYER WINS";
                  }
            }
            
     }        
     
     if (!empty($winner)){
         $winner="<div class='alert alert-dismissible alert-danger mb-1 mt-1 '>
         <h5 class='text-center'><img class='img-responsive' src='./img/trophy_p.png'>
             <span>$winner</span>
         </h5>
     </div>";
     }
     return $winner;
 }
}
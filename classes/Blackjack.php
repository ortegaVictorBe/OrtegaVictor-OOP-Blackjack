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
         $winner="CROUPIER WINS";         

     }elseif (!$this->dealer->hasLost() && !$this->player->hasLost()) {
            
        $dealerScore=$this->dealer->getScore();
        $playerScore=$this->player->getScore();

        if ($dealerScore == 21){
                $winner="CROUPIER WINS - BLACKJACK!";
                $this->player->setlost(true);            

            }elseif ($playerScore == 21) {
                $winner="PLAYER WINS - BLACKJACK!";
                $this->dealer->setlost(true);
                
            } else{

                    if($dealerScore == $playerScore){
                        $winner="TIE !";
                        $this->player->setlost(true);
                        $this->dealer->setlost(true);

                    }elseif ($dealerScore > $playerScore) {
                        $winner="CROUPIER WINS";
                        $this->player->setlost(true);

                    }else{
                        $winner="PLAYER WINS";
                        $this->dealer->setlost(true);
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

 public function getUserMessage(){
     return "<div class='alert alert-dismissible alert-success mb-1 mt-1 '>
     <h5 class='text-center'><img class='img-responsive' src='./img/playing_p.png'>
         <span>Playing ...</span>
     </h5>
 </div>";
 }
}
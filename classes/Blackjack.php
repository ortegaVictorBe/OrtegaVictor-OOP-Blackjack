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

 /**
  * Get the value of deck
  */ 
 public function getDeck()
 {
  return $this->deck;
 }
}
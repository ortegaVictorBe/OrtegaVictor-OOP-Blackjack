<?php
class Dealer extends Player{

    public function hit(Deck $theDeck){
        if ($this->getScore() <=15){
            parent::hit($theDeck);
        }

    }
}
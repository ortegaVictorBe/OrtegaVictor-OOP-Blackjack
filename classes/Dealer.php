<?php
class Dealer extends Player{

    public function hit(Deck $theDeck){    
        while ($this->getScore() <=15) {
            parent::hit($theDeck);
        }       

    }
}
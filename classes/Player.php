<?php
 
class Player 
{
    private $cards=[];
    private bool $lost;

    public function __construct(Deck $theDeck, bool $lost=false){
      $this->lost=$lost;
      array_push($this->cards,$theDeck->drawCard() );
      array_push($this->cards,$theDeck->drawCard() );        
    }

    public function hit(Deck $theDeck){
        array_push($this->cards,$theDeck->drawCard());
        $score=$this->getScore();
        $this->lost = ($score > 21) ? true : false;                
        
    }

    public function surrender(){
        $this->lost=false;
    }

    public function getScore():int{
        $score=0;
        foreach ($this->cards as $oneCard) {
            $score=$score + $oneCard->getValue();               
           }
        return $score;   
    }

    public function hasLost(){
        return $this->lost;
    }
   
    /**
     * Get the value of cards
     */ 
    public function getCards()
    {
        return $this->cards;
    }    
}
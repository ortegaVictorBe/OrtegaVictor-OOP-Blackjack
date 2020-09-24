<?php
declare(strict_types=1);

require 'Suit.php';
require 'Card.php';
require 'Deck.php';
// require 'classes/autoload.php';


$deck = new Deck();
$deck->shuffle();

foreach($deck->getCards() AS $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
}
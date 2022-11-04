<?php

$deck = [1,2,3,4,5,6];
shuffle($deck);
$ploayerCards = [];
$dealerCards = [];

for ($i = 0; $i < count($deck); $i++){
    $playerCards[$i] = $deck[$i];
    $dealerCards[$i] = $deck[$i + 1];
    $i++;
}
var_dump($playerCards);
var_dump($dealerCards);
?>
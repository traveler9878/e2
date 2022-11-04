<?php

$word = 'aapple';



function vowelCount ($wordToCount){
$vowels = 'aeiou';
$vowelCount = 0;
$wordArray = str_split($wordToCount);

    for ($i = 0; $i < strlen($wordToCount); $i++)
    {
        echo('i:  ' . $i . '<BR>');
        echo('letter to check:  ' . $wordArray[$i] . '<BR>');
        echo('strpos:  ' . strpos($vowels, $wordArray[$i]) . '<BR>');
        if (strpos($vowels, $wordArray[$i] == 0)){
            $vowelCount = $vowelCount + 1;
        }
    }
return $vowelCount;
    
}
echo(vowelCount($word));
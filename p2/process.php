<?php

session_start();



//create two dice
$die_1 = [1,2,3,4,5,6];
$die_2 = [1,2,3,4,5,6];

$initial_roll_die_1 = $die_1[rand(0, 5)];
$initial_roll_die_2 = $die_2[rand(0,5)];


$initial_roll = $initial_roll_die_1 + $initial_roll_die_2;


//initialize $winner as an integer and test type to see if the game is over
$winner = 1;

//initialize $results to hold the array of roll results
$results = [$initial_roll];


if($initial_roll == 7 or $initial_roll ==11){
    $winner = true;
}elseif($initial_roll == 2 or $initial_roll == 3 or $initial_roll == 12){
    $winner = false;
}

while (gettype($winner) == 'integer'){
    $d1 = $die_1[rand(0,5)];
    $d2 = $die_2[rand(0,5)];
    $roll = $d1 + $d2;
    array_push($results, $roll);
    if ($roll == 7){
        $winner = false;
    }elseif($roll == $initial_roll){
        $winner = true;
    }
}

$_SESSION['innitial_roll'] = $initial_roll;
$_SESSION['winner'] = $winner;
$_SESSION['results'] = $results;
$_SESSION['bet'] = $_POST['bet'];
$_SESSION['in_progress'] = true;
//var_dump($_SESSION);




header('Location: index.php');
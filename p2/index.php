<?php

session_start();

if($_SESSION['in_progress'] == true)
{
    $initial_roll = $_SESSION['innitial_roll'];
    $winner = $_SESSION['winner'];
    $results = $_SESSION['results'];
    $bet = $_SESSION['bet'];
    $in_progress = true;

}else{
    $_SESSION['in_progress'] = false;
}



require 'index-view.php';
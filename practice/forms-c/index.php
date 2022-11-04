<?php

session_start();
$words = [
    'evidence' => 'A discovery that helps solve a crime',
    'ponder' => 'To think carefully about something',
    'locate' => 'Discover the exact place or position of something or someone',
    'abridge' => 'to shorten by leaving out some parts',
    'regulate' => 'to make rules or laws that control something',
    'modest' => 'not overly proud or confident',
    'impromptu' => 'not prepared ahead of time',
    'stint' => 'a period of time spent at a particular activity',
    'tranquil' => 'free from disturbance or turmoil',
    'mutiny' => 'a turning of a group against a person in charge'
];
$word_array = [];
$word = '';
$word_scrambled = '';
$word_hint = '';
$my_index = rand(0,9);
//debug $_SESSION['word_info'] = null;

if(!isset($_SESSION['word_info'])){
    for ( $i = 0; $i < $my_index; $i++){
        next($words);
    }
    $my_key = key($words);
    $my_hint = current($words);
    $my_scramble = str_shuffle($my_key);
    $word_array = ['word_to_guess' => $my_key, 'hint' => $my_hint, 'scrambled' => $my_scramble];
    $_SESSION['word_info'] = $word_array;


}

if (isset($_SESSION['results'])) {
    $results = $_SESSION['results'];

    $haveAnswer = $results['haveAnswer'];
    $correct = $results['correct'];

    $_SESSION['results'] = null;
}
var_dump($_SESSION['word_info']);
$out_of_session_array = $_SESSION['word_info'];
echo ('Word to guess:  '.$out_of_session_array['word_to_guess'].'<BR>');
echo ('hint:  '.$out_of_session_array['hint'].'<BR>');
echo ('scrambled: '.$out_of_session_array['scrambled'].'<BR>');
require 'index-view.php';
<?php
namespace App\Controllers;

class AppController extends Controller
{
    /**
     * This method is triggered by the route "/"
     */
    public function index()
    {
        $welcomes = ['Welcome', 'Aloha', 'Welkom', 'Bienvenidos', 'Bienvenu', 'Welkomma'];
        
        return $this->app->view('index', [
            'welcome' => $welcomes[array_rand($welcomes)]
        ]);
    }

    public function history(){

        $rounds = $this->app->db()->all('rounds');

        //dump($rounds);

        return $this->app->view('history', ['rounds' => $rounds]);
    }

    public function round(){

        $id = $this->app->param('id');

        $round = $this->app->db()->findById('rounds', $id);

        //dump($round);

        return $this->app->view('round', ['round' => $round]);
    }

    public function process(){
        //dump($this->app->inputAll());

        $this->app->validate([
            'bet' => 'required'
        ]);

//create two dice
$die_1 = [1,2,3,4,5,6];
$die_2 = [1,2,3,4,5,6];

$initial_roll_die_1 = $die_1[rand(0, 5)];
$initial_roll_die_2 = $die_2[rand(0,5)];


$initial_roll = $initial_roll_die_1 + $initial_roll_die_2;


//initialize $winner as an integer and test type to see if the game is over
$winner = 1;

$won = 0;

//initialize $results to hold the array of roll results
$results = [$initial_roll];


if($initial_roll == 7 or $initial_roll ==11){
    $winner = true;
    $won = 1;
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
        $won = 1;
    }
}

$_SESSION['innitial_roll'] = $initial_roll;
$_SESSION['winner'] = $winner;
$_SESSION['results'] = $results;
$_SESSION['bet'] = $_POST['bet'];
$_SESSION['in_progress'] = true;
//var_dump($_SESSION);

//update the database
$this->app->db()->insert('rounds', [
    'bet' => $this->app->input('bet'),
    'won' => $won,
    'timestamp' => date('Y-m-d H:i:s')
]);

return $this->app->redirect('/');
    }
}
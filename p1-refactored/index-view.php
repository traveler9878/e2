<!DOCTYPE html>
<html>

<head>
    <title>Project 1 (David Curtis)</title>
    <style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
    </style>
</head>

<body>
    <h1>Project 1</h1>

    <h2>Mechanics</h2>

    <!-- _Description of Game:_
    + _Roll two dice together in one roll_
    + _Check for winning roll: 7 or 11 on first roll_
    + _Check for losing roll: 2, 3, or 12 on first roll_
    + _If first roll is not a winning or losing first roll then the role value is the point to match in order to win._
    + _Roll two dice together in one roll again until scoring a winning or losing roll, (matching point to match wins,
    roll of 7 loses), repeat until scoring a winning or losing roll._ -->
    <ul>
        <li>Roll two dice together in one roll</li>

        <li>Check for winning roll: 7 or 11 on first roll</li>

        <li>Check for losing roll: 2, 3, or 12 on first roll</li>

        <li>If first roll is not a winning or losing first roll then the role value is the point to match in order to
            win.</li>
        <li>Roll two dice together in one roll again until scoring a winning or losing roll, (matching point to match
            wins,
            roll of 7 loses), repeat until scoring a winning or losing roll.</li>
    </ul>


    <h2>Results</h2>
    <ul>
        <?php foreach($results as $result){

        echo ('<li>You rolled a '.$result.'</li>');

        } ?>

    </ul>

    Did you win....?
    <br>
    <h1>
        <?php if($winner){
        echo('YES, WINNER!');
    }elseif(!$winner){
        echo('SORRY LOSER, TRY AGAIN!');
    }else{
        echo('Police arrived and interrupted the game...');
    }
    ?>
    </h1>

</body>

</html>
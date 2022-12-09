<!DOCTYPE html>
<html>

<head>
    <style>
    body {
        width: 35em;
        margin: 0 auto;
        font-family: Tahoma, Verdana, Arial, sans-serif;
    }
    </style>
</head>

<body>
    <h1>Project 3</h1>
    <form method='POST' action='process.php'>



        <!-- _Description of Game:_
    + _Roll two dice together in one roll_
    + _Check for winning roll: 7 or 11 on first roll_
    + _Check for losing roll: 2, 3, or 12 on first roll_
    + _If first roll is not a winning or losing first roll then the role value is the point to match in order to win._
    + _Roll two dice together in one roll again until scoring a winning or losing roll, (matching point to match wins,
    roll of 7 loses), repeat until scoring a winning or losing roll._ -->
        <ul>

            <input type='radio' id='bet5' name='bet' value='5' checked><label for='bet5'>Bet 5</label>
            <input type='radio' id='bet50' name='bet' value='50' <?php echo($bet == 50)? 'checked' : ''?>><label
                for='bet50'>Bet 50</label>
            <input type='radio' id='bet500' name='bet' value='500' <?php echo($bet == 500)? 'checked' : ''?>><label
                for='bet500'>Bet 500</label>

            <li><button type='submit'>Roll</button> two dice together in one roll</li>

            <li>Rules follow...</li>
        </ul>
        <ul>

            <li>Check for winning roll: 7 or 11 on first roll</li>

            <li>Check for losing roll: 2, 3, or 12 on first roll</li>

            <li>If first roll is not a winning or losing first roll then the role value is the point to match in
                order
                to
                win.</li>
            <li>Roll two dice together in one roll again until scoring a winning or losing roll, (matching point to
                match
                wins,
                roll of 7 loses), repeat until scoring a winning or losing roll.</li>

        </ul>



    </form>

    <div>
        <?php 
if ($in_progress) {
    ?>
        <h2>Results</h2>
        <ul>
            <?php foreach ($results as $result) {
            echo('<li>You rolled a '.$result.'</li>');
        } ?>

        </ul>

        Did you win....?
        <br>
        <?php } ?>

        <h1>
            <?php 
            if($winner){
        echo('YES, WINNER!  You won:  ' . $_SESSION['bet']);
        }elseif(!$winner and isset($winner)){
            echo('SORRY LOSER, you lost:  ' . $_SESSION['bet']);
        }else{
            echo('Welcome to the dice game...');
        }
        $_SESSION['in_progress'] = false;//reset to a blank results page on a refresh of index.php
    ?>
        </h1>

    </div>

</body>

</html>
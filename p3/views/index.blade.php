@extends('templates/master')



@section('content')
    <a href='/history'>Game History</a>
    <?php
    if (isset($_SESSION['in_progress']) and $_SESSION['in_progress'] == true) {
        $initial_roll = $_SESSION['innitial_roll'];
        $winner = $_SESSION['winner'];
        $results = $_SESSION['results'];
        $bet = $_SESSION['bet'];
        $in_progress = true;
    } else {
        $_SESSION['in_progress'] = false;
        $in_progress = false;
        $bet = 5;
    }
    ?>

    <p hidden test='winner'><?php echo $_SESSION['winner']; ?></p>

    <h1>Project 3</h1>

    <h2>Bet and Roll!</h2>
    <form method='POST' action='/process'>


        <input type='radio' id='bet5' name='bet' test='radio-bet5' value='5'><label for='bet5'>Bet
            5</label>

        <input type='radio' test='radio-bet50' id='bet50' name='bet' value='50'><label for='bet50'>Bet
            50</label>
        <input type='radio' test='radio-bet500' id='bet500' name='bet' value='500'><label for='bet500'>Bet
            500</label>
        <ul>

            <li><button type='submit' test='submit-button'>Roll</button> two dice together in one roll
            </li>

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

    @if ($app->errorsExist())
        <ul class='error alert alert-danger'>
            @foreach ($app->errors() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div>
        <?php 
 if ($_SESSION['in_progress'] == true)  {
    ?>
        <h2>Results</h2>
        <ul test="results-ul">
            <?php foreach ($results as $result) {
                echo '<li>You rolled a ' . $result . '</li>';
            } ?>

        </ul>

        Did you win....?
        <br>
        <?php } ?>

        <h1 test='outcome'>
            <?php
            if (isset($winner)) {
                if ($winner) {
                    echo 'YES, WINNER!  You won:  ' . $_SESSION['bet'];
                } elseif (!$winner and isset($winner)) {
                    echo 'SORRY LOSER, you lost:  ' . $_SESSION['bet'];
                } else {
                    echo 'Welcome to the dice game...';
                }
            }
            $_SESSION['in_progress'] = false; //reset to a blank results page on a refresh of index.php
            ?>
        </h1>

    </div>
@endsection

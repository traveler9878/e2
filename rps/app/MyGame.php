<?php

class MyGame extends RPS\Game{
    protected $moves = ['heads', 'tails'];
        /**
     * Compares $playerMove against $computerMove and
     * determines whether player tied, won, or lost
     */
    protected function determineOutcome($playerMove, $computerMove)
    {
        if ($computerMove == $playerMove) {
            return 'winner';
        } else {
            return 'loser';
        }
    }
}
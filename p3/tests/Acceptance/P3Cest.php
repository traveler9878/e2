<?php


namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class P3Cest
{

    // tests
    public function playGame(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->fillField('[test=radio-bet5]', '5');
        $I->click('[test=submit-button]');
        $I->seeElement('[test=outcome]');

        $testWinner = $I->grabTextFrom('[test=winner]');
        $I->comment('Winner = ' . $testWinner);

        if($testWinner){
            $I->see("Winner");
        }else{
            $I->see("Loser");
        }
    }

    public function validateForm(AcceptanceTester $I){
        
        $I->amOnPage('/');

        //submit without bet
        $I->click('[test=submit-button]');

        //check for validation error text from clicking with no bet selected
        $I->see('The value for bet can not be blank');
    }

    public function showHistoryAndRoundDetails(AcceptanceTester $I){
        $I->amOnPage('/history');

        $roundCount = count($I->grabMultiple('[test=round-link]'));
        $I->assertGreaterThanOrEqual(10, $roundCount);

        $timestamp = $I->grabTextFrom('[test=round-link]');
        //dump($timestamp);

        //go to round page with a click
        $I->click($timestamp);

        //verify the round page has the round details
        $I->see($timestamp);
    }
}
*Any instructions/notes in italics should be removed from the template before submitting* 

# Project 3
+ By: David Curtis
+ URL: <http://e2p3.davidcurtis.me>

## Graduate requirement
*x one of the following:*
+ [x] I have integrated testing into my application
+ [ ] I am taking this course for undergraduate credit and have opted out of integrating testing into my application

## Outside resources
https://codeception.com/


## Notes for instructor
I left my round history because there are lots of combinations and having the database results to review might be helpful.

## Codeception testing output
root@hes:/var/www/e2/p3# php vendor/bin/codecept run Acceptance --steps
Codeception PHP Testing Framework v5.0.5 https://helpukrainewin.org

Tests.Acceptance Tests (3) ---------------------------------------------------------------------------------------------------------------------------------
P3Cest: Play game
Signature: Tests\Acceptance\P3Cest:playGame
Test: tests/Acceptance/P3Cest.php:playGame
Scenario --
 I am on page "/"
 I fill field "[test=radio-bet5]","5"
 I click "[test=submit-button]"
 I see element "[test=outcome]"
 I grab text from "[test=winner]"
 Winner = 1
 I see "Winner"
 PASSED 

P3Cest: Validate form
Signature: Tests\Acceptance\P3Cest:validateForm
Test: tests/Acceptance/P3Cest.php:validateForm
Scenario --
 I am on page "/"
 I click "[test=submit-button]"
 I see "The value for bet can not be blank"
 PASSED 

P3Cest: Show history and round details
Signature: Tests\Acceptance\P3Cest:showHistoryAndRoundDetails
Test: tests/Acceptance/P3Cest.php:showHistoryAndRoundDetails
Scenario --
 I am on page "/history"
 I grab multiple "[test=round-link]"
 I assert greater than or equal 10,31
 I grab text from "[test=round-link]"
 I click "2022-12-09 18:29:48"
 I see "2022-12-09 18:29:48"
 PASSED 

------------------------------------------------------------------------------------------------------------------------------------------------------------
Time: 00:00.543, Memory: 10.00 MB

OK (3 tests, 6 assertions)
root@hes:/var/www/e2/p3# php vendor/bin/codecept run Acceptance --steps
Codeception PHP Testing Framework v5.0.5 https://helpukrainewin.org

Tests.Acceptance Tests (3) ---------------------------------------------------------------------------------------------------------------------------------
P3Cest: Play game
Signature: Tests\Acceptance\P3Cest:playGame
Test: tests/Acceptance/P3Cest.php:playGame
Scenario --
 I am on page "/"
 I fill field "[test=radio-bet5]","5"
 I click "[test=submit-button]"
 I see element "[test=outcome]"
 I grab text from "[test=winner]"
 Winner = 1
 I see "Winner"
 PASSED 

P3Cest: Validate form
Signature: Tests\Acceptance\P3Cest:validateForm
Test: tests/Acceptance/P3Cest.php:validateForm
Scenario --
 I am on page "/"
 I click "[test=submit-button]"
 I see "The value for bet can not be blank"
 PASSED 

P3Cest: Show history and round details
Signature: Tests\Acceptance\P3Cest:showHistoryAndRoundDetails
Test: tests/Acceptance/P3Cest.php:showHistoryAndRoundDetails
Scenario --
 I am on page "/history"
 I grab multiple "[test=round-link]"
 I assert greater than or equal 10,32
 I grab text from "[test=round-link]"
 I click "2022-12-09 18:30:02"
 I see "2022-12-09 18:30:02"
 PASSED 

------------------------------------------------------------------------------------------------------------------------------------------------------------
Time: 00:00.176, Memory: 10.00 MB

OK (3 tests, 6 assertions)
root@hes:/var/www/e2/p3# php vendor/bin/codecept run Acceptance --steps
Codeception PHP Testing Framework v5.0.5 https://helpukrainewin.org

Tests.Acceptance Tests (3) ---------------------------------------------------------------------------------------------------------------------------------
P3Cest: Play game
Signature: Tests\Acceptance\P3Cest:playGame
Test: tests/Acceptance/P3Cest.php:playGame
Scenario --
 I am on page "/"
 I fill field "[test=radio-bet5]","5"
 I click "[test=submit-button]"
 I see element "[test=outcome]"
 I grab text from "[test=winner]"
 Winner = 
 I see "Loser"
 PASSED 

P3Cest: Validate form
Signature: Tests\Acceptance\P3Cest:validateForm
Test: tests/Acceptance/P3Cest.php:validateForm
Scenario --
 I am on page "/"
 I click "[test=submit-button]"
 I see "The value for bet can not be blank"
 PASSED 

P3Cest: Show history and round details
Signature: Tests\Acceptance\P3Cest:showHistoryAndRoundDetails
Test: tests/Acceptance/P3Cest.php:showHistoryAndRoundDetails
Scenario --
 I am on page "/history"
 I grab multiple "[test=round-link]"
 I assert greater than or equal 10,33
 I grab text from "[test=round-link]"
 I click "2022-12-09 18:30:10"
 I see "2022-12-09 18:30:10"
 PASSED 

------------------------------------------------------------------------------------------------------------------------------------------------------------
Time: 00:00.163, Memory: 10.00 MB

OK (3 tests, 6 assertions)

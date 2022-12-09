<?php
namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;
use Faker\Factory;

class NewProductPageCest
{
    /**
    * Test adding a new product
    */
    public function testAddingNewProduct(AcceptanceTester $I)
    {
        # The Faker library we used when seeding is also useful for generating dummy text data
        $faker = Factory::create();
        $productName = $faker->words(3, true);
        $sku = str_replace(' ', '-', $productName);
        
        # Act
        $I->amOnPage('/products/new');
        $I->fillField('[test=name-input]', $productName);
        $I->fillField('[test=sku-input]', $sku);
        $I->fillField('[test=description-input]', $faker->paragraph(1, true));
        $I->fillField('[test=price-input]', 4.99);
        $I->fillField('[test=available-input]', 50);
        $I->fillField('[test=weight-input]', 1.34);
        $I->click('[test=submit-button]');

        # Assert
        $I->amOnPage('/product?sku=' . $sku);
        $I->see($productName);
    }

    /**
     * Test validation is working
     */
    public function testValidationIsWorking(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/products/new');
        $I->click('[test=submit-button]');

        # Assert
        $I->seeElement('[test=validation-errors-alert]');
    }
}
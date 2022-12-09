<?php

namespace Tests\Acceptance;

use Tests\Support\AcceptanceTester;

class ProductsPageCest
{
    /**
    * Test that we can load the products page and see the expected content
    */
    public function pageLoads(AcceptanceTester $I)
    {
        # Act
        $I->amOnPage('/products');

        # Assert
        $I->seeElement('[test=all-products-header]');
        $productCount = count($I->grabMultiple('.product-link'));
        $I->assertGreaterThanOrEqual(10, $productCount);
    }
}
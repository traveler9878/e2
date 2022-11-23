<?php

# Define the routes of your application

use App\Controllers\AppController;

return [
    # Ex: The path `/` will trigger the `index` method within the `AppController`
    '/' => ['AppController', 'index'],
    '/contact' => ['AppController', 'contact'],
    '/about' => ['AppController', 'about'],
    '/products' => ['ProductsController', 'index'],
    '/product' => ['ProductsController', 'show'],
    '/products/save-review' => ['ProductsController', 'saveReview'],
    '/practice' => ['AppController', 'practice'],
    '/products/new' => ['ProductsController', 'new']
];
<?php

return [
    'markets' => [
        'title' => 'Markets',
        'title_singular' => 'Market',
        'fields' => [
            'name' => 'Name',
            'name_helper' => 'Special characters are not allowed.',
            'description' => 'Description',
            'description_helper' => ''
        ]
    ],

    'products' => [
        'title' => 'Products',
        'title_singular' => 'Product',
        'fields' => [
            'name' => 'Name',
            'name_helper' => 'Special characters are not allowed.',
        ]
    ],

    'market_prices' => [
        'title' => 'Market Prices',
        'title_singular' => 'Market Price',
        'fields' => [
            'price' => 'Price',
            'price_helper' => 'Number only.',
            'product_helper' => '',
            'market_helper' => '',
        ]
    ],
];
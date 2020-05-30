<?php

return [
    'markets' => [
        'title' => 'စျေးကွက်များ',
        'title_singular' => 'စျေးကွက်',
        'fields' => [
            'name' => 'အမည်',
            'name_helper' => 'Special characters are not allowed.',
            'description' => 'အကြောင်းအရာ',
            'description_helper' => ''
        ]
    ],

    'products' => [
        'title' => 'ကုန်ပစ္စည်းများ',
        'title_singular' => 'ကုန်ပစ္စည်း',
        'fields' => [
            'name' => 'အမည်',
            'name_helper' => 'Special characters are not allowed.',
        ]
    ],

    'market_prices' => [
        'title' => 'စျေးနှုန်းများ',
        'title_singular' => 'စျေးနှုန်း',
        'fields' => [
            'price' => 'တန်ဖိုး',
            'price_helper' => 'Number only.',
            'product_helper' => '',
            'market_helper' => '',
        ]
    ],
];
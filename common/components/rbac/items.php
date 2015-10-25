<?php
return [
    'backend' => [
        'type' => 2,
        'description' => 'access to backend',
    ],
    'user' => [
        'type' => 1,
        'ruleName' => 'userGroup',
    ],
    'admin' => [
        'type' => 1,
        'ruleName' => 'userGroup',
    ],
];

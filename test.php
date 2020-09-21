<?php

$amazon = [
    'EU' => [
        'dev_id' => 233623308975,
        'access_key' => 'AKIAJPQEXA5OEL5OK5QQ',
        'secret_key' => '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'
    ],
    'NA' => [
        'dev_id' => 337320726556,
        'access_key' => 'AKIAJREM35VIGP7YALWA',
        'secret_key' => '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'
    ],
    'FE' => [
        'dev_id' => 716069427621,
        'access_key' => 'AKIAI5IWWEKODV46Z4GA',
        'secret_key' => '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'
    ]
];

echo base64_encode(json_encode($amazon));die('test');

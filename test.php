<?php

$details = [
            'IND' => 'INdia',
            'SL'  => 'SriLanka',
            'SA' => 'South Africa'
        ];

echo base64_encode(json_encode($details));die('test');

<?php

return [
    'db_host' => 'localhost',
    'db_name' => 'movie',
    'db_user' => 'root',
    'db_password' => '12345678',
    'db_options' => [  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false  ]
];
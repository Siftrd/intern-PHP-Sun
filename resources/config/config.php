<?php

return [
    'db_host' => 'localhost',
    'db_name' => 'mysql',
    'db_user' => 'root',
    'db_password' => '',
    'db_options' => [  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false  ]
];
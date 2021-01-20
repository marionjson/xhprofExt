<?php
return [
    //ext��չ
    'extension' => 'tideways_xhprof',

    //redis����
    'redisConfig' => [
        'host' => "127.0.0.1",
        'port' => 6379,
        'timeOut' => 100,
    ],

    //mongo����
    'mongoConfig' => [
        'host' => "mongodb://localhost:27017",
        'dbname' => "xhprof",
    ],
];
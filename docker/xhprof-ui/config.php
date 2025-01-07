<?php

return [
    'save.handler' => 'mongodb',
    'db.host' => 'mongodb://mongo:27017',
    'db.db' => 'xhprof',
    'db.options' => [],
    'debug' => false,
    'mode' => 'development',
//    'profiler.enable' => function() {
//        return true;
//    },
    'profiler.enable' => function () {
        return isset($_GET['profile']) && $_GET['profile'] == 1;
    },
    'profiler.simple_url' => function ($url) {
        $url = preg_replace('/\?.*$/', '', $url);
        $url = preg_replace('/\#.*$/', '', $url);
        return $url;
    },
//    'profiler.simple_url' => function($url) {
//        return preg_replace('/\=\d+/', '', $url);
//    },
    'profiler.options' => [
        'profiler.enable' => function () {
            return true;
        },
        'profiler.flags' => [
            'cpu' => true,
            'memory' => true,
        ],
    ],
];

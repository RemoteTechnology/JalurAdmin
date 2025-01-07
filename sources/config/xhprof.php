<?php

return [
    'enabled' => env('XHPROF_ENABLED', true),
    'output_dir' => storage_path('xhprof'),
    'flags' => TIDEWAYS_XHPROF_FLAGS_CPU + TIDEWAYS_XHPROF_FLAGS_MEMORY,
    'ignore_functions' => [],
    'freq' => 1,
    'extension' => 'tideways_xhprof',
];

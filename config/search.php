<?php

$hosts = env('SEARCH_HOSTS');

return [
    'hosts' => explode('|', $hosts),
];
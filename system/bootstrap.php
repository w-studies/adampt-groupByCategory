<?php

use App\App;
use App\Config;

require __DIR__ . '/autoload.php';

// init config
Config::init();

new App();

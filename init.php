<?php
namespace FISH;

use FISH\core\Runtime;

include_once(__DIR__ . './autoload.php');

(new Runtime)->downloadFeeds();


<?php namespace FISH;

use FISH\QueryAPI;

include_once (__DIR__ . '/autoload.php');


# Get settings
isset($argv[1]) ? $opts['feed']      = trim($argv[1]) : $opts['feed'] = NULL;
isset($argv[2]) ? $opts['site_id']   = trim($argv[2]) : $opts['site_id'] = NULL;
isset($argv[3]) ? $opts['timestamp'] = trim($argv[3]) : $opts['timestamp'] = NULL;


# Download the weather data
$FISH = new QueryAPI($opts['feed']);
$FISH->data_type     = 'json';
$FISH->store_to_disk = true;
$FISH->site_id       = $opts['site_id'];
$FISH->filename      = $opts['feed'] . '_UK_515';
$FISH->timestamp     = $opts['timestamp'];
$data = $FISH->query();


# Check data integrity...
if (!$data) {
    echo "ERROR! Data could not be downloaded.";
} else {
    echo "Success!";
}

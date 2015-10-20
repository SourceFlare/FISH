<?php
namespace FISH;

use FISH\core\Runtime;

include_once(__DIR__ . './autoload.php');

(new Runtime)->downloadFeeds([
    'forecast_site_list',
    'marine_sites_list',
    'three_hour_forecast_capabilities',
    'five_day_summarised_forecast_capabilities',
    'hourly_site_specific_observations_capabilities',
    'hourly_marine_observations_all_sites_capabilities',
    'regional_text_forecast_site_list',
    'hourly_marine_observations_all_sites_all_timesteps',
    'hourly_site_specific_observations_all_sites_all_timesteps',
    'three_hour_forecast_all_sites_all_timesteps',
    'five_day_summarised_forecast_all_sites_all_timesteps'
]);


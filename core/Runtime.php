<?php
namespace FISH\core;

use FISH\actions\Download;
use FISH\actions\StoreToDisk;

class Runtime {

    # EXAMPLE DOWNLOADER
    #
    # This simple expample downloads a selection of the core APIs and
    # dumps them to disk.
    final public function downloadFeeds ()
    {
        $feeds = [
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
        ];

        # Download Feeds One-by-One
        foreach ($feeds as $f) {

            # TRY 10 Times
            for( $i=0; $i<10; $i++ )
            {
                if (StoreToDisk::write($f, Download::feed($f, 'xml'))) {
                    echo "Success: $f<br />\n";
                    break;
                } else {
                    echo "Failed: $f<br />\n";
                }
            }

            sleep(5);
        }
    }
}
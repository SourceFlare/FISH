<?php namespace FISH\core;

use FISH\config\API_Configuration;
use FISH\config\file_get_contents_context;


class API {
    
	/**
	 * Download a given defined feed in the Configuration
	 * @param array $opts
     * @return bool
	 */
    final public static function download_feed ($opts)
    {
	    # TRY 5 Times
        for( $i=0; $i<5; $i++ )
        {
    		if ($d = self::feed($opts))
        		return $d;
    		sleep (1);
        }
        return false;
    }

    /**
     * Download multiple feeds
     * @param array $opts
     * @return string
     */
    final public static function download_feeds ($opts)
    {
        foreach ($opts['feeds'] as $f) {

            # TRY 5 Times for each feed
            for( $i=0; $i<5; $i++ )
            {
                if (StoreToDisk::write($f, self::feed($opts))) {
                    $feed_status[$f]['status'] = true;
                    $feed_status[$f]['data']   = $data;
                    break;
                } else {
                    $feed_status[$f]['status'] = false;
                }
                sleep (1);
            }
        }
        return $feed_status;
    }
	
    /**
     * Downloads the feed from the API
     * @param array $opts
     * @return string
     */
    final public static function feed ($opts)
    {
        $data = file_get_contents (
            API_Configuration::getEndpoint (
                $opts['feed'],
                $opts['data_type'],
                $opts['site_id'],
                $opts['timestamp']
            ) . "&SessionID=" . time(),
            false,
            file_get_contents_context::context()
        );
        return $data;
    }
}

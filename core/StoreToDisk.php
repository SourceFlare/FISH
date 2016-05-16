<?php namespace FISH\core;

use FISH\config\API_Configuration;


class StoreToDisk
{
	/**
	 * Writes the contents of feed to the disk
	 * @param string $feed_name
	 * @param string $data
     * @return bool
	 */
    final public static function write ($feed_name, $data)
    {
        # Check Whether Data Returned
        if (empty($data) || empty($feed_name))
            return false;
		
        # Get path to save data to
        $save_path = API_Configuration::getSavePath();
        
        # Store Feed to Disk
        file_put_contents ("$save_path$feed_name", $data);

        # Confirm Download OK
        return true;
    }
}

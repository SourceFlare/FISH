<?php
namespace FISH\actions;


class StoreToDisk
{
    final public static function write ($feed_name, $data)
    {
        # Check Whether Data Returned
        if (empty($data) || empty($feed_name))
            return false;

        # Store Feed to Disk
        file_put_contents ("./data/$feed_name", $data);

        # Confirm Download OK
        return true;
    }
}

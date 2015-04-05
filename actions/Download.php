<?php
namespace FISH\actions;

use FISH\config\API;
use FISH\config\file_get_contents_context;

class Download {

    final public static function feed ($feed_name, $data_type)
    {
        $data = file_get_contents (
            API::getEndpoint (
                $feed_name,
                $data_type
            ) . "&SessionID=" . time(),
            false,
            file_get_contents_context::context()
        );
        return $data;
    }
}

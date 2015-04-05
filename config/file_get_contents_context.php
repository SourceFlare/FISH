<?php
namespace FISH\config;

class file_get_contents_context
{
    final public static function context()
    {
        // Create a stream
        $opts = array(
            'http' => array(
                'method' => "GET",
                'header' => "Accept-language: en\r\n" .
                    "User-Agent: FISH: Weather Feed Collector\r\n"
            )
        );
        return stream_context_create($opts);
    }
}

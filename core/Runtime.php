<?php
namespace FISH\core;

use FISH\actions\Download;
use FISH\actions\StoreToDisk;

class Runtime {

    # EXAMPLE DOWNLOADER
    #
    # This simple expample downloads a selection of the core APIs and
    # dumps them to disk.
    final public function downloadFeeds ($feeds)
    {
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

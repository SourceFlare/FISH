<?php namespace FISH;

use FISH\core\API;
use FISH\core\StoreToDisk;

include_once (__DIR__ . '/autoload.php');


class QueryAPI {

    public $feed;
    public $data_type;
    public $site_id;
    public $timestamp;
    public $store_to_disk;
    public $filename;

    /**
     * Constructor for querying the API
     * @param $feed
     * @param string $data_type
     * @param bool $store_to_disk
     * @param string $filename
     * @param bool $site_id
     * @param bool $timestamp
     */
    public function __construct ($feed, $data_type='json', $store_to_disk=true, $filename='temp.dat', $site_id=false, $timestamp=false) {
        $this->feed          = $feed;
        $this->data_type     = $data_type;
        $this->site_id       = $site_id;
        $this->timestamp     = $timestamp;
        $this->store_to_disk = $store_to_disk;
        $this->filename      = $filename;
    }

    /**
     * Get the requested feed and either returns or stores to disk,
     * based on your setting for "store_to_disk" (Bool)
     * @return string $data
     */
    public function query () {

        if (empty($this->feed) or !isset($this->feed))
        	return false;
    	
        # Download feed data
        $data = API::download_feed (
            $this->build_query_object()
        );
        
        # Check if data has been downloaded
        if (!$data)
            $data = 'ERROR';
        
        # If store_to_disk is true
        if ($this->store_to_disk)
        	StoreToDisk::write ($this->feed . '.json', $data);
        
        return $data;
    }

    /**
     * Build the query_object array from the class configuration
     * @return array mixed
     */
    private function build_query_object () {
        $opts['feed']          = $this->feed;
        $opts['data_type']     = $this->data_type;
        $opts['site_id']       = $this->site_id;
        $opts['timestamp']     = $this->timestamp;
        $opts['store_to_disk'] = $this->store_to_disk;
        return $opts;
    }
}

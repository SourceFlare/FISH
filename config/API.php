<?php
namespace FISH\config;

class API
{
    protected static $API_KEY  = 'put_your_api_key_in_here';

    protected static $BASE_URL = 'http://datapoint.metoffice.gov.uk/public/data/';

    # Site List
    protected static $forecast_site_list                                                = 'val/wxfcs/all/##data_type##/sitelist?res=daily&key=##api_key##';

    # Regional Text Forecast
    protected static $regional_text_forecast_site_list                                  = 'txt/wxfcs/regionalforecast/##data_type##/sitelist?key=##api_key##';
    protected static $regional_text_forecast_capabilities                               = 'txt/wxfcs/regionalforecast/##data_type##/capabilities?key=##api_key##';
    protected static $regional_text_forecast_site_specific                              = 'txt/wxfcs/regionalforecast/##data_type##/##site_id##?key=##api_key##';

    # Hourly Site Specific Observations
    protected static $hourly_site_specific_observations_capabilities                    = 'val/wxobs/all/##data_type##/capabilities?res=hourly&key=##api_key##';
    protected static $hourly_site_specific_observations_all_sites_all_timesteps         = 'val/wxobs/all/##data_type##/all?res=hourly&key=##api_key##';
    protected static $hourly_site_specific_observations_all_sites_timestep_specific     = 'val/wxobs/all/##data_type##/all?res=hourly&time=##timestep##&key=##api_key##';
    protected static $hourly_site_specific_observations_site_specific_all_timesteps     = 'val/wxobs/all/##data_type##/##site_id##?res=hourly&key=##api_key##';
    protected static $hourly_site_specific_observations_site_specific_timestep_specific = 'val/wxobs/all/##data_type##/##site_id##?res=hourly&time=##timestep##&key=##api_key##';

    # Hourly Marine Observations
    protected static $marine_sites_list                                                 = 'val/wxmarineobs/all/##data_type##/sitelist?key=##api_key##';
    protected static $hourly_marine_observations_all_sites_capabilities                 = 'val/wxmarineobs/all/##data_type##/capabilities?res=hourly&key=##api_key##';
    protected static $hourly_marine_observations_all_sites_all_timesteps                = 'val/wxmarineobs/all/##data_type##/all?res=hourly&type=ShipSynops&key=##api_key##';
    protected static $hourly_marine_observations_site_specific_all_timesteps            = 'val/wxmarineobs/all/##data_type##/##site_id##?res=hourly&key=##api_key##';

    # Three Hour Forecast
    protected static $three_hour_forecast_capabilities                                  = 'val/wxfcs/all/##data_type##/all/capabilities?res=3hourly&key=##api_key##';
    protected static $three_hour_forecast_site_specific_all_timesteps                   = 'val/wxfcs/all/##data_type##/##site_id##?res=3hourly&key=##api_key##';
    protected static $three_hour_forecast_all_sites_timestep_specific                   = 'val/wxfcs/all/##data_type##/all?res=3hourly&time=##timestep##&key=##api_key##';
    protected static $three_hour_forecast_site_specific_timestep_specific               = 'val/wxfcs/all/##data_type##/##site_id##?res=3hourly&time=##timestep##&key=##api_key##';
    protected static $three_hour_forecast_all_sites_all_timesteps                       = 'val/wxfcs/all/##data_type##/all?res=3hourly&key=##api_key##';

    # Five Day Forecast
    protected static $five_day_summarised_forecast_capabilities                         = 'val/wxfcs/all/##data_type##/capabilities?res=daily&key=##api_key##';
    protected static $five_day_summarised_forecast_site_specific_all_timesteps          = 'val/wxfcs/all/##data_type##/##site_id##?res=daily&key=##api_key##';
    protected static $five_day_summarised_forecast_site_specific_timestep_specific      = 'val/wxfcs/all/##data_type##/##site_id##?res=daily&time=##timestep##&key=##api_key##';
    protected static $five_day_summarised_forecast_all_sites_timestep_specific          = 'val/wxfcs/all/##data_type##/all?res=daily&time=##timestep##&key=##api_key##';
    protected static $five_day_summarised_forecast_all_sites_all_timesteps              = 'val/wxfcs/all/##data_type##/all?res=daily&key=##api_key##';


    ## Build the Feed URL ################################################
    final public static function getEndpoint ($feed_name, $data_type='xml', $site_id='', $timestep='')
    {
        # Get the Endpoint URL
        $url = self::$BASE_URL . self::$$feed_name;

        # Insert API_KEY and DATA_TYPE
        $url = self::InsertKey ($url);
        $url = self::InsertDataItems ($url, $data_type, $site_id, $timestep);

        # Return Completed URL
        return $url;
    }

    ## Get the API Key ###################################################
    final public static function getAPIKey ()
    {
        return self::$API_KEY;
    }

    ## Insert Key Type into URL ##########################################
    final public static function InsertKey ($url)
    {
        return str_replace('##api_key##', self::getAPIKey(), $url);
    }

    ## Insert Data Type (XML / JSON) into URL ############################
    final public static function InsertDataItems ($url, $data_type='xml', $site_id='', $timestep='')
    {
        # Insert Items if they exist
        $url = str_replace('##data_type##', $data_type, $url);
        $url = str_replace('##site_id##', $site_id, $url);
        $url = str_replace('##timestep##', $timestep, $url);

        # Return Completed URL
        return $url;
    }
}

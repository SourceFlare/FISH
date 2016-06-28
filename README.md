# FISH

[![Code Climate](https://codeclimate.com/github/SourceFlare/FISH/badges/gpa.svg)](https://codeclimate.com/github/SourceFlare/FISH) [![Test Coverage](https://codeclimate.com/github/SourceFlare/FISH/badges/coverage.svg)](https://codeclimate.com/github/SourceFlare/FISH/coverage) [![Issue Count](https://codeclimate.com/github/SourceFlare/FISH/badges/issue_count.svg)](https://codeclimate.com/github/SourceFlare/FISH)

FISH is a PHP package to interact with the Met Office Datapoint APIs

## API Usage
Let's get straight into an example... code to download the 5-Day weather feed from Datapoint APIs.

    namespace FISH;
  
    use FISH\actions\Download;
    use FISH\actions\StoreToDisk;
  
    include_once(__DIR__ . './autoload.php');    # Autoloader to load classes
  
    $feed = 'five_day_summarised_forecast_all_sites_all_timesteps';    # 5 Day Forecast Feed
    $file = "/tmp/$feed.xml";    # File to save feed to
  
    StoreToDisk::write (
      $file,     # File to save feed to
      Download::feed(
        $feed,   # Specify feed name to engine
        'xml'    # Get XML from API (Opt: JSON, XML)
      )
    );
  
*Please note: this is a static call, you may wish to wrap this in a class and call as a new object for an OO approach.

## Configuration
API has changed or you'd like to add a new one to the config? Great, just edit the /config/API.php file - API endpoints are listed as such:

    protected static $API_KEY  = 'put-your-api-key-in-here';
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
    protected static $three_hour_forecast_capabilities                                  = 'val/wxfcs/all/##data_type##/capabilities?res=3hourly&key=##api_key##';
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


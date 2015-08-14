# FISH
FISH is a PHP package to interact with the Met Office Datapoint APIs

## Usage Example
Example code to download the 5-Day weather feed from Datapoint APIs.

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

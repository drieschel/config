<?php
namespace drieschel\config;
/**
 * @author Immanuel Klinkenberg <klinkenberg@speicher-werk.de>
 */
class JsonFileConfig extends ArrayConfig
{
  /**
   * @var string
   */
  protected $configFile;
  
  /**
   * @param string $configFile
   * @throws \Exception
   */
  public function __construct($configFile)
  {
    if(!file_exists($configFile))
    {
      throw new \Exception('The file "' . $configFile . '" doesn\'t exist!');
    }
    
    $this->configFile = $configFile;    
    $configArray = json_decode(file_get_contents($configFile));    
    if(!is_array($configArray))
    {
      throw new \Exception('Wrong format given!');
    }    
    parent::__construct($configArray);
  }  
}

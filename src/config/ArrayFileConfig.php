<?php
namespace drieschel\config;
/**
 * @author Immanuel Klinkenberg <klinkenberg@speicher-werk.de>
 */
class ArrayFileConfig extends ArrayConfig
{
  /**
   *
   * @var string
   */
  protected $configFile;
  
  public function __construct($configFile)
  {
    if(!file_exists($configFile))
    {
      throw new \Exception('The file "' . $configFile . '" doesn\'t exist!');
    }
    $this->configFile = $configFile;
    
    $configArray = require $this->configFile;
    
    if(!is_array($configArray))
    {
      throw new \Exception('no array given!');
    }
    
    parent::__construct($configArray);
  }
}
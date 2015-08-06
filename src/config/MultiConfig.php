<?php
namespace drieschel\config;

/**
 * Fasst mehrere Configs zu einer zusammen.
 * @author Sebastian Rüsche <sebastian.ruesche@gmx.de>
 */
class MultiConfig implements Config
{
  /**
   * @var Config[]
   */
  private $configs;
  
  
  public function __construct(array $configs = array())
  {
    $this->configs = array();
    foreach ($configs as $config)
    {
      if ($config instanceof Config)
      {
        $this->configs[] = $config;
      }
      else
      {
        throw new \Exception('Argument does not implement interface drieschel\\config\\Config.');
      }
    }
  }
  
  public function appendConfig(Config $config)
  {
    $this->configs[] = $config;
  }
  
  public function prependConfig(Config $config)
  {
    array_unshift($this->configs, $config);
  }

  public function get($name, $default = null)
  {
    foreach ($this->configs as $config)
    {
      if ($config->contains($name))
      {
        return $config->get($name);
      }
    }
    return $default;
  }

  public function contains($name)
  {
    foreach ($this->configs as $config)
    {
      if ($config->contains($name))
      {
        return true;
      }
    }
    return false;
  }
}
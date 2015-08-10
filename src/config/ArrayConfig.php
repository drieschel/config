<?php
namespace drieschel\config;
/**
 * @author Immanuel Klinkenberg <klinkenberg@speicher-werk.de>
 */
class ArrayConfig implements Config
{
  /**
   * @var array
   */
  protected $config = array();
  
  /**
   * @param array $config
   */
  public function __construct(array $config)
  {
    $this->config = $config;
  }
  
  /**
   * 
   * @param string $name
   * @param mixed $default
   * @return mixed
   */
  public function get($name, $default = null)
  {
    $config = &$this->config;
    foreach(explode('.', $name) as $index)
    {
      if(isset($config[$index]))
      {
        $config = &$config[$index];
      }
      else 
      {
        return $default;
      }
    }
    return $config;
  }
  
  /**
   * @param string $name
   * @return boolean
   */
  public function contains($name)
  {
    $config = &$this->config;
    foreach (explode('.', $name) as $index)
    {
      if (isset($config[$index]))
      {
        $config = &$config[$index];
      }
      else
      {
        return false;
      }
    }
    return true;
  }
  
  /**
   * @return mixed[]
   */
  public function toArray()
  {
    return $this->config;
  }
}
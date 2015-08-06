<?php
namespace drieschel\config;
/**
 * Dient als Grundlage für alle Konfigurationsmöglichkeiten.
 *
 * @author Immanuel Klinkenberg <klinkenberg@speicher-werk.de>
 */
interface Config
{
  public function get($name, $default = null);
  public function contains($name);
}

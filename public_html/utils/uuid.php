<?php
class UUID 
{
    public static function generate() 
    {
      $s = uniqid('', true);
      $hex = substr($s, 0, 13);
      $dec = $s[13] . substr($s, 15); // skip the dot
      return base_convert($hex, 16, 36) . base_convert($dec, 10, 36);
    }
}
?>
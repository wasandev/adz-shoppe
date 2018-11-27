<?php

namespace App\Traits;

trait UnicodeSlug
{

  /**
   * @param $string
   *
   * @return mixed|string
   */
  // public function makeSlug($string)
  // {
  //   $LNSH = '/[^\-\s\pN\pL]+/u';
  //   $SADH = '/[\-\s]+/';

  //   $string = preg_replace($LNSH, '', mb_strtolower($string, 'UTF-8'));
  //   $string = preg_replace($SADH, '-', $string);
  //   $string = trim($string, '-');

  //   return $string;
  // }

  public static function makeSlug($title, $separator = '-')
  {
   // $title = static::ascii($title);
  
    // Convert all dashes/underscores into separator
    $flip = $separator == '-' ? '_' : '-';
    $title = preg_replace('![' . preg_quote($flip) . ']+!u', $separator, $title);
  
    // Remove all characters that are not the separator, letters, numbers, or whitespace.
    $title = preg_replace('![^' . preg_quote($separator) . 'ก-๙\pL\pN\s]+!u', '', mb_strtolower($title));
  
    // Replace all separator characters and whitespace by a single separator
    $title = preg_replace('![' . preg_quote($separator) . '\s]+!u', $separator, $title);

    return trim($title, $separator);
  }

}
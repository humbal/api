<?php

namespace App\Http\Traits;

trait CoinTrait
{
    /**
     * Get denomination value in string.
     *  For instance, if denomination is 100 cent, it should be labeled as 'silver-dollar' 
     *  and like wise other.
     * 
     * @param int $val
     * @return string
     */
    public function getDenominationLabel($val) {
      $label = '';
      switch($val) {
        case 100:
          $label = 'silver-dollar';
          break;
  
        case 50:
          $label = 'half-dollar';
          break;
  
        case 25:
          $label = 'quarter';
          break;
  
        case 10:
          $label = 'dime';
          break;
  
        case 5:
          $label = 'nickel';
          break;
  
        case 1:
          $label = 'penny';
          break;
      }
  
      return $label;
  }
}
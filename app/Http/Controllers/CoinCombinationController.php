<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CoinCombinationController extends Controller
{
    protected $denominations = [100, 50, 25, 10, 5, 1];

    public function getTotalCombinations() {
        $input_bill = request('bill');

        // convert Dollar to Cent
        $amount = $input_bill * 100;
        $denomination_count_array = [];
    
        foreach ($this->denominations as $denomination) {
          $count_deno = floor($amount / $denomination);
          $deno_index = $this->getDenominationLabel($denomination);
          $denomination_count_array[$deno_index] = $count_deno;
          $amount = fmod($amount, $denomination);
        }
    
        return $denomination_count_array;
    }

    protected function getDenominationLabel($val) {
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

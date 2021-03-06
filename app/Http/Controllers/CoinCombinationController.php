<?php

namespace App\Http\Controllers;

use App\Services\CoinService;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class CoinCombinationController extends Controller {
    /**
     * The denominations contained in the collection.
     *
     * @var array
     */
    protected $denominations = [100, 50, 25, 10, 5, 1];

    /**
     * Get coin's optimal combination
     *  If 12.85 is inputed, the output format is:
     *  {"silver-dollar":12,"half-dollar":1,"quarter":1,"dime":1,"nickel":0,"penny":0}
     * 
     * @param $coinService
     * @return JSON object
     */
    public function getTotalCombinations(CoinService $coinService) {
        $input_bill = request('bill');

        // convert Dollar to Cent
        $amount = $input_bill * 100;
        $denomination_count_array = [];
    
        foreach ($this->denominations as $denomination) {
          $count_deno = floor($amount / $denomination);
          $deno_index = $coinService->getLabel($denomination);
          $denomination_count_array[$deno_index] = $count_deno;
          $amount = fmod($amount, $denomination);
        }
    
        return $denomination_count_array;
    }
}

<?php

namespace App\Services;

use App\Http\Traits\CoinTrait;

class CoinService
{
    use CoinTrait;

    public function getLabel($deno)
    {
        return $this->getDenominationLabel($deno);
    }
}
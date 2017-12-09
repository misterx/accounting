<?php

namespace MisterX\Accounting;


interface CurrencyAmountInterface
{

    /**
     * Amount currency
     * @return CurrencyInterface
     */
    public function getCurrency(): CurrencyInterface;

    /**
     * Currency amount
     * @return float
     */
    public function getAmount():float;
}
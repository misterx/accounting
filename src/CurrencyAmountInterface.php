<?php

namespace MisterX\Accounting;


interface CurrencyAmountInterface
{

    /**
     * Currency identifier
     * @return mixed
     */
    public function getId();

    /**
     * Currency rate
     * @return float
     */
    public function getRate():float;


    /**
     * Currency amount
     * @return float
     */
    public function getAmount():float;
}
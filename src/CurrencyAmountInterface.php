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
     * @return mixed
     */
    public function getRate();


    /**
     * Currency amount
     * @return float
     */
    public function getAmount():float;
}
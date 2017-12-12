<?php

namespace MisterX\Accounting;


interface AccountInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * Account currency
     * @return CurrencyInterface
     */
    public function getCurrency(): CurrencyInterface;

}
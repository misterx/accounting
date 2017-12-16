<?php

namespace MisterX\Accounting;


use Money\Currency;

interface AccountInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * Account currency
     * @return Currency
     */
    public function getCurrency(): Currency;

}
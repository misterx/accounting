<?php

namespace MisterX\Accounting;


use Money\Currency;

class Account implements AccountInterface
{
    /**
     * @var
     */
    private $id;
    /**
     * @var Currency
     */
    private $currency;

    public function __construct($id, Currency $currency)
    {

        $this->id = $id;
        $this->currency = $currency;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

}
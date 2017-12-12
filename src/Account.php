<?php

namespace MisterX\Accounting;


class Account implements AccountInterface
{
    /**
     * @var
     */
    private $id;
    /**
     * @var CurrencyInterface
     */
    private $currency;

    public function __construct($id, CurrencyInterface $currency)
    {

        $this->id = $id;
        $this->currency = $currency;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCurrency(): CurrencyInterface
    {
        return $this->currency;
    }

}
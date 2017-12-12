<?php

namespace MisterX\Accounting;


class CurrencyAmount implements CurrencyAmountInterface
{


    /**
     * @var CurrencyInterface
     */
    private $currency;
    /**
     * @var float
     */
    private $amount;

    public function __construct(CurrencyInterface $currency, $amount)
    {

        $this->currency = $currency;
        $this->amount = (float)$amount;
    }


    public function getCurrency(): CurrencyInterface
    {
        return $this->currency;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

}
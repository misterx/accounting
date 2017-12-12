<?php

namespace MisterX\Accounting\Tests\impl;


use MisterX\Accounting\CurrencyConverterInterface;
use MisterX\Accounting\CurrencyInterface;

class CurrencyConverter implements CurrencyConverterInterface
{
    private $rates = [];

    public function addRate(CurrencyInterface $fromCurrency, CurrencyInterface $toCurrency, float $rate)
    {
        $this->rates[$fromCurrency->getId()][$toCurrency->getId()] = $rate;
    }

    public function convert(CurrencyInterface $fromCurrency, CurrencyInterface $toCurrency, float $amount): float
    {
        if ($fromCurrency == $toCurrency) {
            return 1;
        }

        if (!array_key_exists($fromCurrency->getId(), $this->rates) or !array_key_exists($toCurrency->getId(),
                $this->rates[$fromCurrency->getId()])) {
            throw new \Exception('Unable to find rates');
        }
        $rate = $this->rates[$fromCurrency->getId()][$toCurrency->getId()];

        return $amount * $rate;
    }
}
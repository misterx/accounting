<?php

namespace MisterX\Accounting;


interface CurrencyConverterInterface
{
    public function convert(CurrencyInterface $fromCurrency, CurrencyInterface $toCurrency, float $amount): float;
}
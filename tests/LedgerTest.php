<?php

namespace MisterX\Accounting\Tests;

use MisterX\Accounting\Account;
use MisterX\Accounting\Currency;
use MisterX\Accounting\Entry;
use MisterX\Accounting\Tests\impl\CurrencyConverter;
use MisterX\Accounting\Tests\impl\Ledger;
use MisterX\Accounting\Tests\impl\ReferenceFinder;
use MisterX\Accounting\Transaction;

class LedgerTest extends \PHPUnit_Framework_TestCase
{
    /** @var  Ledger */
    private $ledger;

    private $usdAccount1;
    private $usdAccount2;
    private $eurAccount1;
    private $eurAccount2;

    /**
     * @return CurrencyConverter
     */
    private function getCurrencyConverter()
    {
        $eurCurrency = new Currency('EUR');
        $usdCurrency = new Currency('USD');
        $currencyConverter = new CurrencyConverter();
        $currencyConverter->addRate($eurCurrency, $usdCurrency, 1.17);
        $currencyConverter->addRate($usdCurrency, $eurCurrency, 0.85);
        return $currencyConverter;
    }

    /**
     * @return ReferenceFinder
     */
    private function getReferenceFinder()
    {
        return new ReferenceFinder();
    }

    protected function setUp()
    {
        $this->usdAccount1 = new Account('1', new Currency('USD'));
        $this->usdAccount2 = new Account('2', new Currency('USD'));
        $this->eurAccount1 = new Account('3', new Currency('EUR'));
        $this->eurAccount2 = new Account('4', new Currency('EUR'));
    }

    private function initLedger()
    {
        $this->ledger = new Ledger($this->getCurrencyConverter(), new Currency('USD'), $this->getReferenceFinder());
    }

    public function testBalance()
    {
        $this->initLedger();
        $transaction = new Transaction();
        $transaction->addEntry(new Entry($this->usdAccount1, $this->usdAccount2, 100));
        $this->ledger->addTransaction($transaction);
        //usd1: +100
        //usd2: -100
        $this->assertEquals($this->ledger->accountBalance($this->usdAccount1, false), 100);
        $this->assertEquals($this->ledger->accountBalance($this->usdAccount2, false), -100);

        //usd2: -100 + 50
        //usd1: +100 - 50
        $transaction = new Transaction();
        $transaction->addEntry(new Entry($this->usdAccount2, $this->usdAccount1, 50));
        $this->ledger->addTransaction($transaction);

        $this->assertEquals($this->ledger->accountBalance($this->usdAccount1, false), 50);
        $this->assertEquals($this->ledger->accountBalance($this->usdAccount2, false), -50);
    }


}

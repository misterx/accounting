<?php

namespace MisterX\Accounting\Tests;


use MisterX\Accounting\Account;
use MisterX\Accounting\Entry;
use Money\Currency;

class EntryTest extends \PHPUnit_Framework_TestCase
{
    private $usdAccount1;
    private $usdAccount2;
    private $eurAccount1;
    private $eurAccount2;

    public function setUp()
    {
        $this->usdAccount1 = new Account('1', new Currency('USD'));
        $this->usdAccount2 = new Account('2', new Currency('USD'));
        $this->eurAccount1 = new Account('3', new Currency('EUR'));
        $this->eurAccount2 = new Account('4', new Currency('EUR'));
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Entry amount must be greater then 0
     */
    public function testNegativeEntryAmount()
    {
        new Entry($this->usdAccount1, $this->usdAccount2, -1);
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Using same accounts in one entry are incorrect
     */
    public function testSameAccounts()
    {
        new Entry($this->usdAccount1, $this->usdAccount1, 10);
    }

    /**
     * @expectedException \LogicException
     * @expectedExceptionMessage Currency in both accounts must be same
     */
    public function testDifferentCurrencies()
    {
        new Entry($this->usdAccount1, $this->eurAccount1, 10);
    }

}

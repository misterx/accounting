<?php

namespace MisterX\Accounting\Tests\impl;


use MisterX\Accounting\AccountInterface;
use MisterX\Accounting\Currency;
use MisterX\Accounting\CurrencyConverterInterface;
use MisterX\Accounting\CurrencyInterface;
use MisterX\Accounting\LedgerInterface;
use MisterX\Accounting\ReferenceFinderInterface;
use MisterX\Accounting\TransactionInterface;

class Ledger implements LedgerInterface
{
    public const DEBIT = 1;
    public const CREDIT = -1;
    private $transactions = [];
    /**
     * @var CurrencyConverter
     */
    private $currencyConverter;
    /**
     * @var Currency
     */
    private $ledgerCurrency;
    /**
     * @var ReferenceFinderInterface
     */
    private $referenceFinder;

    public function __construct(
        CurrencyConverter $currencyConverter,
        Currency $ledgerCurrency,
        ReferenceFinderInterface $referenceFinder
    ) {

        $this->currencyConverter = $currencyConverter;
        $this->ledgerCurrency = $ledgerCurrency;
        $this->referenceFinder = $referenceFinder;
    }


    public function addTransaction(TransactionInterface $transaction)
    {
        $ledgerEntries = [];
        foreach ($transaction->getEntries() as $entry) {
            $ledgerAmount = $this->getAmountInLedgerCurrency($entry->getDebitAccount(), $entry->getAmount(),
                $transaction->getTimestamp());
            $ledgerEntries[] = [
                'accountId' => $entry->getDebitAccount()->getId(),
                'amount' => $entry->getAmount(),
                'ledgerAmount' => $ledgerAmount,
                'type' => self::DEBIT
            ];

            $ledgerEntries[] = [
                'accountId' => $entry->getCreditAccount()->getId(),
                'amount' => $entry->getAmount(),
                'ledgerAmount' => $ledgerAmount,
                'type' => self::CREDIT
            ];
        }
        $this->transactions[$transaction->getId()]['entries'] = $ledgerEntries;
    }

    private function getAmountInLedgerCurrency(AccountInterface $account, float $amount, \DateTimeInterface $date)
    {
        return $this->getCurrencyConverter($date)->convert($account->getCurrency(), $this->getLedgerCurrency(),
            $amount);
    }

    public function removeTransaction($transactionId)
    {
        // TODO: Implement removeTransaction() method.
    }

    public function accountBalance(AccountInterface $account, bool $inLedgerCurrency = true): float
    {
        $balance = 0;
        foreach ($this->transactions as $transaction) {
            foreach ($transaction['entries'] as $entry) {
                if ($entry['accountId'] != $account->getId()) {
                    continue;
                }
                $balance += ($inLedgerCurrency ? $entry['ledgerAmount'] : $entry['amount']) * $entry['type'];
            }
        }
        return $balance;
    }


    public function getReferenceFinder(): ReferenceFinderInterface
    {
        // TODO: Implement getReferenceFinder() method.
    }

    public function getCurrencyConverter(\DateTimeInterface $date): CurrencyConverterInterface
    {
        //For tests use static converter that not depends on date
        return $this->currencyConverter;
    }

    public function getTransaction($transactionId): TransactionInterface
    {
        // TODO: Implement getTransaction() method.
    }

    public function getLedgerCurrency(): CurrencyInterface
    {
        return $this->ledgerCurrency;
    }


}
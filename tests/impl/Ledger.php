<?php

namespace MisterX\Accounting\Tests\impl;


use MisterX\Accounting\AccountInterface;
use MisterX\Accounting\EntryInterface;
use MisterX\Accounting\LedgerInterface;
use MisterX\Accounting\ReferenceFinderInterface;
use MisterX\Accounting\TransactionInterface;
use Money\Money;

class Ledger implements LedgerInterface
{
    public const DEBIT = 1;
    public const CREDIT = -1;
    private $transactions = [];


    /**
     * @var ReferenceFinderInterface
     */
    private $referenceFinder;

    public function __construct(
        ReferenceFinderInterface $referenceFinder
    ) {
        $this->referenceFinder = $referenceFinder;
    }


    public function addTransaction(TransactionInterface $transaction)
    {
        $ledgerEntries = [];
        /** @var EntryInterface $entry */
        foreach ($transaction->getEntries() as $entry) {

            $ledgerEntries[] = [
                'accountId' => $entry->getDebitAccount()->getId(),
                'amount' => $entry->getAmount(),
                'type' => self::DEBIT
            ];

            $ledgerEntries[] = [
                'accountId' => $entry->getCreditAccount()->getId(),
                'amount' => $entry->getAmount(),
                'type' => self::CREDIT
            ];
        }
        $this->transactions[$transaction->getId()]['entries'] = $ledgerEntries;
    }


    public function removeTransaction($transactionId)
    {
        // TODO: Implement removeTransaction() method.
    }

    public function accountBalance(AccountInterface $account): Money
    {
        $balance = new Money(0, $account->getCurrency());
        foreach ($this->transactions as $transaction) {
            foreach ($transaction['entries'] as $entry) {
                if ($entry['accountId'] != $account->getId()) {
                    continue;
                }
                $balance = $balance->add($entry['amount']->multiply($entry['type']));
            }
        }
        return $balance;
    }


    public function getReferenceFinder(): ReferenceFinderInterface
    {
        // TODO: Implement getReferenceFinder() method.
    }

    public function getTransaction($transactionId): TransactionInterface
    {
        // TODO: Implement getTransaction() method.
    }

}
<?php

namespace MisterX\Accounting;


use Money\Money;

interface LedgerInterface
{

    /**
     * Save transaction into ledger
     * @param TransactionInterface $transaction
     */
    public function addTransaction(TransactionInterface $transaction);


    /**
     * Get transaction
     * @param $transactionId
     * @return mixed
     */
    public function getTransaction($transactionId):TransactionInterface;

    /**
     * Remove transaction
     * This will affect all balances after removed transaction dates
     * @param $transactionId
     * @return mixed
     */
    public function removeTransaction($transactionId);

    /**
     * Account balance
     * @param AccountInterface $account
     * @return Money
     */
    public function accountBalance(AccountInterface $account): Money;

    /**
     * @return ReferenceFinderInterface
     */
    public function getReferenceFinder(): ReferenceFinderInterface;

}
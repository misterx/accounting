<?php

namespace MisterX\Accounting;


interface LedgerInterface
{

    /**
     * Save transaction into ledger
     * @param TransactionInterface $transaction
     * @return mixed
     */
    public function addTransaction(TransactionInterface $transaction):TransactionInterface;

    /**
     * Get transaction by ID
     * @param $transactionId
     * @return TransactionInterface
     */
    public function getTransaction($transactionId):TransactionInterface;


    /**
     * Update existing transaction
     * @param TransactionInterface $transaction
     * @return TransactionInterface
     */
    public function updateTransaction(TransactionInterface $transaction):TransactionInterface;

    /**
     * Remove transaction
     * @param TransactionInterface $transaction
     * @return mixed
     */
    public function removeTransaction(TransactionInterface $transaction);


    /**
     * Account balance
     * @return CurrencyAmountInterface
     */
    public function accountBalance(): CurrencyAmountInterface;
}
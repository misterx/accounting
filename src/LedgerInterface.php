<?php

namespace MisterX\Accounting;


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
     * @param $transactionId
     * @return mixed
     */
    public function removeTransaction($transactionId);

    /**
     * Account balance
     * @param AccountInterface $account
     * @param bool $inLedgerCurrency
     * @return float
     */
    public function accountBalance(AccountInterface $account, bool $inLedgerCurrency): float;

    /**
     * @return ReferenceFinderInterface
     */
    public function getReferenceFinder(): ReferenceFinderInterface;

    /**
     * @param \DateTimeInterface $date
     * @return CurrencyConverterInterface
     */
    public function getCurrencyConverter(\DateTimeInterface $date): CurrencyConverterInterface;

    /**
     * Get this leger currency
     * @return CurrencyInterface
     */
    public function getLedgerCurrency(): CurrencyInterface;
}
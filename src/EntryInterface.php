<?php

namespace MisterX\Accounting;


use Money\Money;

interface EntryInterface
{
    /**
     * Debit account
     * @return AccountInterface
     */
    public function getDebitAccount():AccountInterface;

    /**
     * Credit account
     * @return AccountInterface
     */
    public function getCreditAccount():AccountInterface;

    /**
     * Amount currency
     * @return Money
     */
    public function getAmount(): Money;

    /**
     * Entry references
     * @return ReferenceInterface[]
     */
    public function getReferences():array;

    /**
     * Entry description
     * @return null|string
     */
    public function getDescription():?string;

}
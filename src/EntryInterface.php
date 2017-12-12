<?php

namespace MisterX\Accounting;


interface EntryInterface
{
    /**
     * Debit account
     * @return AccountInterface
     */
    public function getDebitAccount():AccountInterface;

    /**
     * Creadit account
     * @return AccountInterface
     */
    public function getCreditAccount():AccountInterface;

    /**
     * Amount currency
     * @return float
     */
    public function getAmount(): float;

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
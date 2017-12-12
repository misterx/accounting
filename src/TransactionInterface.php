<?php

namespace MisterX\Accounting;

interface TransactionInterface
{

    /**
     * Transaction identifier
     * @return mixed
     */
    public function getId();

    /**
     * Transaction description
     * @return null|string
     */
    public function getDescription():?string;

    /**
     * Transaction owner
     * @return TransactionOwnerInterface|null
     */
    public function getOwner():?TransactionOwnerInterface;

    /**
     * Transaction entries
     * @return EntryInterface[]
     */
    public function getEntries():array;

    /**
     * Transaction timestamp
     */

    public function getTimestamp(): \DateTimeInterface;
}
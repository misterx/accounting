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
     * Transaction entries
     * @return \Traversable
     */
    public function getEntries(): \Traversable;

    /**
     * Transaction timestamp
     */
    public function getTimestamp(): \DateTimeInterface;
}
<?php

namespace MisterX\Accounting;


use Ramsey\Uuid\Uuid;

class Transaction implements TransactionInterface
{
    /** @var  string */
    private $description;

    /** @var  TransactionOwnerInterface */
    private $owner;

    /** @var  EntryInterface[] */
    private $entries;
    /**
     * @var \DateTimeInterface
     */
    private $timestamp;

    private $id;

    public function __construct()
    {
        $this->timestamp = new \DateTimeImmutable();
        $this->id = (string)Uuid::uuid1();
    }

    public function getTimestamp(): \DateTimeInterface
    {
        return $this->timestamp;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }


    public function getDescription():?string
    {
        return $this->description;
    }

    public function getOwner():?TransactionOwnerInterface
    {
        return $this->owner;
    }

    /**
     * @param TransactionOwnerInterface $owner
     */
    public function setOwner(TransactionOwnerInterface $owner)
    {
        $this->owner = $owner;
    }

    public function addEntry(EntryInterface $entry)
    {
        $this->entries[] = $entry;
    }

    public function getEntries(): array
    {
        return $this->entries;
    }


}
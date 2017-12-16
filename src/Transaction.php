<?php

namespace MisterX\Accounting;


use Ramsey\Uuid\Uuid;

class Transaction implements TransactionInterface
{
    /** @var  string */
    private $description;

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

    public function addEntry(EntryInterface $entry)
    {
        $this->entries[] = $entry;
    }

    public function getEntries(): \Traversable
    {
        return new \ArrayObject($this->entries);
    }


}
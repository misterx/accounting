<?php

namespace MisterX\Accounting;


class Entry implements EntryInterface
{
    /** @var AccountInterface */
    private $debitAccount;
    /** @var AccountInterface */
    private $creditAccount;
    /** @var float */
    private $amount;

    /** @var array */
    private $references = [];

    /** @var string */
    private $description;

    public function __construct(AccountInterface $debitAccount, AccountInterface $creditAccount, float $amount)
    {
        $this->validateAccounts($debitAccount, $creditAccount);
        $this->validateAmount($amount);
        $this->debitAccount = $debitAccount;
        $this->creditAccount = $creditAccount;
        $this->amount = $amount;
    }

    private function validateAccounts(AccountInterface $debitAccount, AccountInterface $creditAccount)
    {
        if ($debitAccount == $creditAccount) {
            throw new \LogicException('Using same accounts in one entry are incorrect');
        }

        if ($debitAccount->getCurrency() != $creditAccount->getCurrency()) {
            throw new \LogicException('Currency in both accounts must be same');
        }
    }

    private function validateAmount(float $amount)
    {
        if ($amount <= 0) {
            throw new \LogicException('Entry amount must be greater then 0');
        }
    }


    public function getDebitAccount(): AccountInterface
    {
        return $this->debitAccount;
    }

    public function getCreditAccount(): AccountInterface
    {
        return $this->creditAccount;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getReferences(): array
    {
        return $this->references;
    }

    public function addReference(ReferenceInterface $reference)
    {
        $this->references[] = $reference;
    }

    public function getDescription():?string
    {
        return $this->description;
    }

}
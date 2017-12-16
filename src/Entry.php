<?php

namespace MisterX\Accounting;


use Money\Money;

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

    /** @var  Money */
    private $entryCurrency;

    public function __construct(AccountInterface $debitAccount, AccountInterface $creditAccount, int $amount)
    {
        $this->validateAccounts($debitAccount, $creditAccount);
        $this->validateAmount($amount);

        $this->entryCurrency = $debitAccount->getCurrency();

        $this->debitAccount = $debitAccount;
        $this->creditAccount = $creditAccount;
        $this->amount = $amount;
    }

    private function validateAccounts(AccountInterface $debitAccount, AccountInterface $creditAccount)
    {
        if ($debitAccount->getId() === $creditAccount->getId()) {
            throw new \LogicException('Using same accounts in one entry are incorrect');
        }

        if (!$debitAccount->getCurrency()->equals($creditAccount->getCurrency())) {
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

    public function getAmount(): Money
    {
        return new Money($this->amount, $this->entryCurrency);
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
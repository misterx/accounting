<?php

namespace MisterX\Accounting;


interface TransactionOwnerInterface
{
    /**
     * Get owner identifier
     * @return mixed
     */
    public function getId();
}
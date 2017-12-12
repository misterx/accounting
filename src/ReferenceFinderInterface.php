<?php

namespace MisterX\Accounting;


interface ReferenceFinderInterface
{
    public function getReference(string $class, $id): ReferenceInterface;
}
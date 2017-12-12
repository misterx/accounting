<?php

namespace MisterX\Accounting\Tests\impl;


use MisterX\Accounting\ReferenceFinderInterface;
use MisterX\Accounting\ReferenceInterface;

class ReferenceFinder implements ReferenceFinderInterface
{
    public function getReference(string $class, $id): ReferenceInterface
    {
        return new $class($id);
    }

}
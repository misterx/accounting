<?php

namespace MisterX\Accounting;


interface ReferenceInterface
{
    /**
     * Reference identifier
     * @return mixed
     */
    public function getReferenceId();

    /**
     * Get record title
     * @return mixed
     */
    public function getReferenceTitle();

    /**
     * Get reference type name
     * @return mixed
     */
    public function getReferenceName();
}
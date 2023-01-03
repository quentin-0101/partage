<?php

namespace App\Models\DataObject;

abstract class AbstractDataObject
{
    public abstract function formatTableau(): array;
    public abstract static function getInstance($object);
}
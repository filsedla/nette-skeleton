<?php

namespace App;

/**
 * TODO move to Hyperrow library
 *
 * @property-read string $tableName
 * @property-read string $classNameRoot
 */
trait TDatabaseHelpers
{

    /**
     * @return string
     */
    abstract public function getTableName();

    /**
     * @return string
     */
    public function getClassNameRoot()
    {
        return str_replace('_', '', ucwords($this->getTableName(), '_'));
    }

    /**
     * @return int
     */
    public function setDeleted()
    {
        return $this->update(['deleted' => 1]);
    }

}

<?php

namespace App;

use Filsedla\Hyperrow;

/**
 * @property-read string $tableName
 */
class BaseRow extends Hyperrow\HyperRow
{
    use TDatabaseHelpers;
    use TBaseDependenciesWithConstructor;

    /**
     * TODO move to Hyperrow library
     *
     * @return string
     */
    public function getTableName()
    {
        return $this->activeRow->getTable()->getName();
    }

}

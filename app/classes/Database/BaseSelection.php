<?php

namespace App;

use Filsedla\Hyperrow;

/**
 * @property-read string $tableName
 * @method BaseSelection where($condition, $parameters = [])
 */
class BaseSelection extends Hyperrow\HyperSelection
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
        return $this->selection->getName();
    }

    /**
     * TODO move to Hyperrow library
     *
     * @return bool
     */
    public function exists()
    {
        return (bool)$this->limit(1)->fetch();
    }

}

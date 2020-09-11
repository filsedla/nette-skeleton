<?php

namespace App;

/**
 * @method BaseSelection table($tableName)
 */
class Database extends GeneratedDatabase
{
    //use SmartObject;

    /**
     * TODO move to Hyperrow library
     *
     * @return \Nette\Database\ResultSet
     */
    public function getCurrentDatabaseName()
    {
        // We could also use parameters: database.default.dbname and spare the query
        return $this->context->fetchField('SELECT database()');
    }

    /**
     * TODO move to Hyperrow library
     *
     * @return array [table name => string|array|null Primary column name, array or null]
     */
    public function getPrimaryColumns()
    {
        $dbName = $this->getCurrentDatabaseName();

        // Create array of table names
        $tables = [];
        $query = 'SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = ? ORDER BY table_name ASC';
        $tablesResult = $this->context->query($query, $dbName);
        foreach ($tablesResult as $tableRecord) {
            if (strtolower($tableRecord['table_type']) !== 'view') {
                $tables[] = $tableRecord['table_name'];
            }
        }

        // Create array of primary columns
        $primaryColumns = array_fill_keys($tables, null);
        $query = 'SELECT table_name, column_name FROM information_schema.key_column_usage WHERE table_schema = ? AND constraint_name = ?';
        $primaryColumnsResult = $this->context->query($query, $dbName, 'PRIMARY');
        foreach ($primaryColumnsResult as $primaryColumnRecord) {
            $tableName = $primaryColumnRecord['table_name'];
            $columnName = $primaryColumnRecord['column_name'];

            if (is_string($primaryColumns[$tableName])) {
                $primaryColumns[$tableName] = [$primaryColumns[$tableName], $columnName];

            } elseif (is_array($primaryColumns[$tableName])) {
                $primaryColumns[$tableName][] = $columnName;

            } else {
                $primaryColumns[$tableName] = $columnName; // $primaryColumns[$tableName] === null
            }
        }

        return $primaryColumns;
    }

    /**
     * TODO optimize, do not use getPrimaryColumns()
     * TODO move to Hyperrow library
     *
     * @return array
     */
    public function getTableNames()
    {
        return array_keys($this->getPrimaryColumns());
    }

    /**
     * TODO move to Hyperrow library
     *
     * @return BaseSelection[]
     */
    public function getTables()
    {
        $result = [];
        foreach ($this->getTableNames() as $tableName) {
            $result[$tableName] = $this->table($tableName);
        }
        return $result;
    }

}

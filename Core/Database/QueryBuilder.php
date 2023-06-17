<?php

namespace Core\Database;

class QueryBuilder
{
    protected $table;
    protected $connection;

    public function __construct($table, $connection)
    {
        $this->table = $table;
        $this->connection = $connection;
    }

    public function get()
    {
        $statement = $this->connection->prepare("SELECT * FROM $this->table");
        $statement->execute();

        return $statement->fetchAll();
    }

    // Add more query methods as needed
}

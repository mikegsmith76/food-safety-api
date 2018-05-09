<?php

namespace App\Data\Repository\MySQL;

use App\Data\Repository\BusinessTypeInterface;

class BusinessType implements BusinessTypeInterface
{
    /**
     * @var \Pdo
     */
    protected $connection = null;

    /**
     * Constructor
     * @param \Pdo $connection
     */
    public function __construct(\Pdo $connection)
    {
        $this->connection = $connection;
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO business_type (id, type) VALUES(:id, :type)";
        $statement = $this->connection->prepare($sql);

        return (bool) $statement->execute($data);
    }
}
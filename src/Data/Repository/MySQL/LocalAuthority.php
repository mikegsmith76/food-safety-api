<?php

namespace App\Data\Repository\MySQL;

use \App\Data\Repository\LocalAuthorityInterface;

class LocalAuthority implements LocalAuthorityInterface
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
        $sql = "INSERT INTO local_authority (code, name, url, email_address) VALUES(:code, :name, :url, :email_address)";
        $statement = $this->connection->prepare($sql);

        return (bool) $statement->execute($data);
    }
}
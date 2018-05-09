<?php

namespace App\Data\Repository\MySQL;

use \App\Data\Model\Business as BusinessModel;
use \App\Data\Repository\BusinessInterface;

/**
 * Class Business
 *
 * @author Mike Smith <mail@mikegsmith.co.uk>
 * @package App\Data\Repository
 */
class Business implements BusinessInterface
{
    /**
     * @var \Pdo
     */
    protected $connection = null;

    /**
     * @var array
     */
    protected $fields = [
        'id',
        'scheme_id',
        'scheme_business_id',
        'local_authority_business_id',
        'business_type_id',
        'local_authority_id',
        'name',
        'address_line_1',
        'address_line_2',
        'address_line_3',
        'post_code',
        'rating',
        'rating_date',
        'pending_rating',
        'longitude',
        'latitude',
    ];

    protected $tableName = 'business';

    /**
     * Constructor
     * @param \Pdo $connection
     */
    public function __construct(\Pdo $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @param array $data
     * @return bool
     */
    public function create(array $data)
    {
        $fields = $this->fields;
        array_shift($fields);

        $boundParameters = array_map(function($value) {
            return ':' . $value;
        }, $fields);

        $sql = "INSERT INTO {$this->tableName} (" . implode(",", $fields) . ") VALUES (" . implode(",", $boundParameters) . ")";

        $statement = $this->connection->prepare($sql);
        $result = (bool) $statement->execute($data);

/*        if (!$result) {
            var_dump($data);
            var_dump($statement->errorInfo());
            exit;
        }*/

        return $result;
    }

    /**
     * @param $id
     * @return BusinessModel
     */
    public function getByid($id)
    {
        return new BusinessModel([
            "name" => "Chez Mikeys",
            "rating" => 5
        ]);
    }

    /**
     * @param $post_code
     * @param $distance
     * @return array
     */
    public function getByPostCodeWithinDistance($post_code, $distance)
    {
        $items = [];
        $items[] = $this->getByid(12345);
        return $items;
    }
}
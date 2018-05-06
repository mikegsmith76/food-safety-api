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
    public function getByid($id)
    {
        return new BusinessModel([
            "name" => "Chez Mikeys",
            "rating" => 5
        ]);
    }

    public function getByPostCodeWithinDistance($post_code, $distance)
    {
        $items = [];
        $items[] = $this->getByid(12345);
        return $items;
    }
}
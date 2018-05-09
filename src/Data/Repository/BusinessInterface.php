<?php

namespace App\Data\Repository;

use \App\Data\Model\Business as BusinessModel;

/**
 * Interface BusinessInterface
 *
 * @author Mike Smith <mail@mikegsmith.co.uk>
 * @package App\Data\Repository
 */
interface BusinessInterface
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     * @return BusinessModel
     */
    public function getByid($id);

    /**
     * @param $post_code
     * @param $distance
     * @return BusinessModel[]
     */
    public function getByPostCodeWithinDistance($post_code, $distance);
}
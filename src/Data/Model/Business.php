<?php

namespace App\Data\Model;

/**
 * Class Business
 *
 * @author Mike Smith <mail@mikegsmith.co.uk> *
 * @package App\Data\Model
 */
class Business
{
    protected $data = [];

    public function __construct($data = [])
    {
        $this->data = $data;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return (!empty($this->data['name'])) ? (string) $this->data['name'] : '';
    }

    /**
     * @return int
     */
    public function getRating()
    {
        return (!empty($this->data['rating'])) ? (int) $this->data['rating'] : 0;
    }
}
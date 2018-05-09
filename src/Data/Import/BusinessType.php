<?php

namespace App\Data\Import;

use \App\Data\Repository\BusinessTypeInterface;

class BusinessType
{
    /**
     * @var array
     */
    protected $imported = [];

    /**
     * @var BusinessTypeInterface
     */
    protected $repository = null;

    public function __construct(
        BusinessTypeInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function process($fileName)
    {
        $xml = simplexml_load_file($fileName);

        foreach ($xml->EstablishmentCollection->EstablishmentDetail as $establishment) {
            if (isset($this->imported[(string) $establishment->BusinessTypeID])) {
                continue;
            }

            $this->repository->create([
                'id'   => (string) $establishment->BusinessTypeID,
                'type' => (string) $establishment->BusinessType,
            ]);

            $this->imported[(string) $establishment->BusinessTypeID] = true;
        }
    }
}
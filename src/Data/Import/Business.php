<?php

namespace App\Data\Import;

use \App\Data\Repository\BusinessInterface;

class Business
{
    /**
     * @var array
     */
    protected $imported = [];

    /**
     * @var BusinessInterface
     */
    protected $repository = null;

    public function __construct(
        BusinessInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function process($fileName)
    {
        $xml = simplexml_load_file($fileName);

        foreach ($xml->EstablishmentCollection->EstablishmentDetail as $establishment) {
            $result = $this->repository->create([
                'scheme_id'          => 1,
                'scheme_business_id' => (int) $establishment->FHRSID,
                'local_authority_business_id' => (int) $establishment->LocalAuthorityBusinessID,
                'business_type_id' => (int) $establishment->BusinessTypeID,
                'local_authority_id' => (int) $establishment->LocalAuthorityCode,
                'name' => (string) $establishment->BusinessName,
                'address_line_1' => (string) $establishment->AddressLine1,
                'address_line_2' => (string) $establishment->AddressLine2,
                'address_line_3' => (string) $establishment->AddressLine3,
                'post_code' => (string) $establishment->PostCode,
                'rating' => (int) $establishment->RatingValue,
                'rating_date' => (string) $establishment->RatingDate,
                'pending_rating' => 'true' === strtolower((string) $establishment->NewRatingPending) ? 1 : 0,
                'longitude' => (double) $establishment->Geocode->Longitude,
                'latitude' => (double) $establishment->Geocode->Latitude,
            ]);

            $this->imported[(string) $establishment->LocalAuthorityCode] = true;
        }
    }
}
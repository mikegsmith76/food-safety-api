<?php

namespace App\Data\Import;

use \App\Data\Repository\LocalAuthorityInterface;

class LocalAuthority
{
    /**
     * @var array
     */
    protected $imported = [];

    /**
     * @var LocalAuthorityInterface
     */
    protected $repository = null;

    public function __construct(
        LocalAuthorityInterface $repository
    )
    {
        $this->repository = $repository;
    }

    public function process($fileName)
    {
        $xml = simplexml_load_file($fileName);

        foreach ($xml->EstablishmentCollection->EstablishmentDetail as $establishment) {
            if (isset($this->imported[(string) $establishment->LocalAuthorityCode])) {
                continue;
            }

            $this->repository->create([
                'code'          => (string) $establishment->LocalAuthorityCode,
                'name'          => (string) $establishment->LocalAuthorityName,
                'url'           => (string) $establishment->LocalAuthorityWebSite,
                'email_address' => (string) $establishment->LocalAuthorityEmailAddress,
            ]);

            $this->imported[(string) $establishment->LocalAuthorityCode] = true;
        }
    }
}
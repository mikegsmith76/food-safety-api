<?php

namespace App\Controller\Establishment;

use \App\Data\Model\Serializer\Json\Business as BusinessModelSerializer;
use \App\Data\Repository\BusinessInterface as BusinessRepositoryInterface;
use \Symfony\Component\HttpFoundation\Response;

/**
 * Class Nearby
 *
 * @author Mike Smith <mail@mikegsmith.co.uk>
 * @package App\Controller\Establishment
 */
class Nearby
{
    /**
     * @var BusinessRepositoryInterface
     */
    protected $obj_repository = null;

    /**
     * Constructor
     * @param BusinessRepositoryInterface $repository
     * @param BusinessModelSerializer $serializer
     */
    public function __construct(
        BusinessRepositoryInterface $repository,
        BusinessModelSerializer $serializer
    )
    {
        $this->repository = $repository;
        $this->serializer = $serializer;
    }

    /**
     * @param $post_code
     * @param $distance
     * @return Response
     */
    public function dispatch($post_code, $distance) : Response
    {
        $arr_models = $this->repository->getByPostCodeWithinDistance($post_code, $distance);;

        return new Response(
            $this->serializer->serializeList($arr_models),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/json'
            ]
        );
    }
}
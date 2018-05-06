<?php
namespace App\Controller\Establishment;

use \App\Data\Model\Serializer\Json\Business as BusinessModelSerializer;
use \App\Data\Repository\BusinessInterface as BusinessRepositoryInterface;
use \App\Data\Repository\Exception\Business\NotFound as BusinessNotFoundException;
use \Symfony\Component\HttpFoundation\Response;

/**
 * Class Detail
 *
 * @author Mike Smith <mail@mikegsmith.co.uk>
 * @package App\Controller\Establishment
 */
class Detail
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
     * @param $id
     * @return Response
     */
    public function dispatch($id) : Response
    {
        try {
            $model = $this->repository->getByid($id);

        } catch (BusinessNotFoundException $obj_exception) {
            return new Response('', Response::HTTP_NOT_FOUND);
        }

        return new Response(
            $this->serializer->serialize($model),
            Response::HTTP_OK,
            [
                'Content-Type' => 'application/json'
            ]
        );
    }
}
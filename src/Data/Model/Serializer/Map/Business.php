<?php

namespace App\Data\Model\Serializer\Map;

use \App\Data\Model\Business as BusinessModel;

/**
 * Class Business
 *
 * @author Mike Smith <mail@mikegsmith.co.uk>
 * @package App\Data\Model\Serializer\Array
 */
class Business
{
    /**
     * @param BusinessModel $model
     * @return array
     */
    public function serialize(BusinessModel $model)
    {
        return [
            'business_name'   => $model->getName(),
            'business_rating' => $model->getRating()
        ];
    }

    /**
     * @param array $models
     * @return array
     */
    public function serializeList(array $models)
    {
        $items = [];
        $count = 0;

        foreach ($models as $model) {
            if (!($model instanceof BusinessModel)) {
                continue;
            }

            $items = $this->serialize($model);
            $count++;
        }

        return [
            'count' => $count,
            'items' => $items
        ];
    }
}
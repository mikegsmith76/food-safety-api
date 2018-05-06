<?php

namespace App\Data\Model\Serializer\Json;

use \App\Data\Model\Business as BusinessModel;
use App\Data\Model\Serializer\Map\Business as MapSerializer;

/**
 * Class Business
 *
 * @author Mike Smith <mail@mikegsmith.co.uk>
 * @package App\Data\Model\Serializer\Json
 */
class Business extends MapSerializer
{
    /**
     * @param BusinessModel $model
     * @return string
     */
    public function serialize(BusinessModel $model)
    {
        return json_encode(parent::serialize($model));
    }

    /**
     * @param array $models
     * @return string
     */
    public function serializeList(array $models)
    {
        $items = [];
        $count = 0;

        foreach ($models as $model) {
            if (!($model instanceof BusinessModel)) {
                continue;
            }

            $items = parent::serialize($model);
            $count++;
        }

        return json_encode([
            'count' => $count,
            'items' => $items
        ]);
    }
}
<?php

namespace App\Transform;

use Illuminate\Http\Resources\Json\JsonResource;

class BookTransform extends JsonResource
{
    public function toArray($request)
    {
        $parent = parent::toArray($request);
        return array_merge(
            $parent,
            [
                'authors' => $this->authors->pluck('name'),
                'publisher' => $this->publisher->name
            ]
        );
    }
}

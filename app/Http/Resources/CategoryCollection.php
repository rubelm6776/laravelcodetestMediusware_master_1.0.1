<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection->transform(function ($customer){
                return [
                    'id' => $customer->id,
                    'title' => $customer->title,
                    'description' => $customer->description,
                    'created_at' => $customer->created_at,
                    'updated_at' => $customer->updated_at,
                ];
            })
        ];
    }
}

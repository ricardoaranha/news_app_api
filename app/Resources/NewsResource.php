<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewsResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
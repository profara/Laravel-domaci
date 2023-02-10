<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
{
    public static $wrap = 'ad';
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->resource->id,
            'naslov' => $this->resource->naslov,
            'cena' => $this->resource->cena,
            'opis' => $this->resource->opis,
            'pregledi' => $this->resource->pregledi,
            'tip' => $this->resource->type,
            'user' => new UserResource($this->resource->user)

        ];
    }
}
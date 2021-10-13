<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Hotels\Hotel */
class ProviderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'hotel' => $this->getName(),
            'hotelRate' => $this->getRate(),
            'hotelFare' => $this->getFare(),
            'roomAmenities' => $this->getAmenities(),
        ];
    }
}

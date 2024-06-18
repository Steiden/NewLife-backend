<?php

namespace App\Http\Resources;

use App\Models\Locality;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertAddressResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'street_name' => $this->name,
            'house_number' => $this->house_number,
            'locality' => Locality::find($this->locality_id),
        ];
    }
}

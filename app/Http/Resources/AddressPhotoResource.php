<?php

namespace App\Http\Resources;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressPhotoResource extends JsonResource
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
            'imgae' => $this->image,
            'advert' => new AdvertResource(Advert::find($this->advert_id))
        ];
    }
}

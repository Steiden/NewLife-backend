<?php

namespace App\Http\Resources;

use App\Models\AdvertAddress;
use App\Models\AdvertPhoto;
use App\Models\AdvertStatus;
use App\Models\AnimalType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'animal_type' => AnimalType::find($this->animal_type_id),
            'advert_address' => new AdvertAddressResource(AdvertAddress::find($this->advert_address_id)),
            'user' => new UserResource(User::find($this->user_id)),
            'user_id' => $this->user_id,
            'advert_status' => AdvertStatus::find($this->advert_status_id),
            'advert_status_id' => $this->advert_status_id,
            'advert_photos' => AdvertPhoto::where('advert_id', $this->id)->get(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

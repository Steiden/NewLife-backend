<?php

namespace App\Http\Resources;

use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'second_name' => $this->second_name,
            'first_name' => $this->first_name,
            'patronymic' => $this->patronymic,
            'telephone' => $this->telephone,
            'email' => $this->email,
            'login' => $this->login,
            'password' => $this->password,
            'is_banned' => $this->is_banned,
            'role' => Role::find($this->role_id),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}

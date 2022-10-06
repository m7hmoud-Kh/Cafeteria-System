<?php

namespace App\Http\Resources\Api\admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'user_id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'user_register' => $this->created_at
        ];
    }
}

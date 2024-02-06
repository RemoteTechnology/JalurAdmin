<?php

namespace App\Http\Resources\User;

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
<<<<<<< HEAD
            'id'                => $this->id,
            'first_name'        => $this->first_name,
            'last_name'         => $this->last_name,
            'middle_name'       => $this->middle_name,
            'age'               => $this->age,
            'role'              => $this->role,
            'gender'            => $this->gender,
            'image'             => $this->image,
            'weight'            => $this->weight,
            'height'            => $this->height,
            'size_cloth'        => $this->size_cloth,
            'phone'             => $this->phone,
            'code'              => $this->code,
            'password_admin'    => $this->password_admin,
=======
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'middle_name' => $this->middle_name,
            'age' => $this->age,
            'birth_date' => $this->birth_date,
            'role' => $this->role,
            'gender' => $this->gender,
            'image' => $this->image,
            'weight' => $this->weight,
            'height' => $this->height,
            'size_cloth' => $this->size_cloth,
            'phone' => $this->phone,
            'code' => $this->code,
            'password_admin' => $this->password_admin,
>>>>>>> 1e4ff48d77f85eaa3b989ed4268b405f6d5d558e
        ];
    }
}

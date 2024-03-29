<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ContractorResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'contact_number' => $this->contact_number,
            'profile_image' => $this->profile_image,
            'contractor_portfolio' => $this->contractor_portfolio,
            'user_type' => $this->user_type,
        ];
    }
}

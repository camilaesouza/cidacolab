<?php

namespace App\Http\Resources;

use App\Enums\UserType;
use Illuminate\Http\Resources\Json\JsonResource;

class Complaint extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'is_solved' => $this->is_solved,
            'created_at' => format_date($this->created_at),

            'links' => [
                'show' => $this->when(true, route('complaints.show', $this->id)),
                'destroy' => $this->when(current_user()->type === UserType::ADMIN
                    || current_user()->id === $this->requester_user_id,
                    route('complaints.destroy', $this->id)),
            ],
        ];
    }
}

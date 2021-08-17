<?php

namespace App\Http\Resources;

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

            'links' => [
                'edit' => $this->when(true, route('complaints.edit', $this->id)),
                'show' => $this->when(true, route('complaints.show', $this->id)),
                'destroy' => $this->when(true, route('complaints.destroy', $this->id)),
            ],
        ];
    }
}
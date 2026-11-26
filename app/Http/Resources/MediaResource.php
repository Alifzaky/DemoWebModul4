<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'type' => $this->type,
            'score' => $this->score,
            'year' => $this->year,
            'details' => [
                'creator' => $this->creator,
                'total_count' => $this->total_count,
            ],
            'favorited_by' => UserResource::collection($this->whenLoaded('users')),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}

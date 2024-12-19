<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'content' => $this->content,
            'user' => [
                'id' => $this->user->id,
                'name' => $this->user->name,
            ],
            'product' => [
                'id' => $this->product->id,
                'name' => $this->product->name,
            ],
            'replies' => CommentResource::collection($this->whenLoaded('replies')),
            'created_at' => $this->created_at->toDateTimeString(),
        ];
    }
}
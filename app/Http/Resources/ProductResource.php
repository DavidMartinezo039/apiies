<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $categoryIds = $this->categories->pluck('id')->toArray();

        return [
            'id' => $this->id,
            'category_ids' => $categoryIds,
            'name' => $this->name,
            'description' => $this->description,
            'price' => number_format($this->price / 100, 2),
            'category' => CategoryResource::make($this->whenLoaded('category')),
            'photo' => $this->photo,
            'comments' => ProductCommentResource::collection($this->whenLoaded('comments')),
            ];
    }
}

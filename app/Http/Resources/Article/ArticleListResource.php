<?php

namespace App\Http\Resources\Article;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleListResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'cover_photo' => $this->cover_photo,
            'user_id' => $this->user_id,
            'user_name' => $this->user->name,
            'description' => $this->description,
            'created_at' => Carbon::parse($this->created_at)->format('M d')
        ];
    }
}

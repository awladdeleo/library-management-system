<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'isbn_number' => $this->isbn_number,
            'author' => $this->author,
            'genre' => $this->genre,
            'quantity' => $this->quantity,
            'thumbnail' => $this->thumbnail,
        ];
    }
}

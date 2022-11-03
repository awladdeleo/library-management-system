<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IssuedBookResource extends JsonResource
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
            'user_id' => $this->user->id,
            'user_name' => $this->user->name,
            'email' => $this->user->email,
            'phone' => $this->user->phone,
            'user_image' => $this->user->image,
            'book_id' => $this->book->id,
            'book' => $this->book->title,
            'author' => $this->book->author,
            'genre' => $this->book->genre,
            'status' => $this->status,
            'issue_date' => date('d-m-Y' , strtotime($this->issue_date)),
            'return_date' => date('d-m-Y' , strtotime($this->return_date)),
            'book_thumbnail' => $this->book->thumbnail,
        ];
    }
}
